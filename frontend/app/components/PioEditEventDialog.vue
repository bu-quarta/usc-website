<script setup lang="ts">
  import { FetchError } from "ofetch"
  import { useFileDialog, useDropZone } from "@vueuse/core"
  import { useToast } from "@/components/ui/toast/use-toast"
  import VueDatePicker from "@vuepic/vue-datepicker"
  import "@vuepic/vue-datepicker/dist/main.css"
  import { CloudUpload } from "lucide-vue-next"

  const props = withDefaults(defineProps<{ event: EventPost }>(), {
    event: () => ({
      id: 0,
      title: "",
      description: "",
      date_time: "",
      location: "",
      image_url: "",
      status: "",
      date_posted: "",
      date_time_posted: "",
    }),
  })
  const emit = defineEmits(["update"])

  const { togglePioEditEventDialog } = useStates()
  const dropZoneRef = ref<HTMLDivElement>()
  const { toast } = useToast()

  const title = ref("")
  const description = ref("")
  const location = ref("")
  const date = ref(new Date())
  const file = ref<File | null>(null)
  const src = ref<string>("")

  const config = useRuntimeConfig()

  watch(
    () => props.event,
    (prop: EventPost) => {
      title.value = prop.title
      description.value = prop.description
      location.value = prop.location
      date.value = new Date(prop.date_time?.replace(" | ", " "))
      src.value = `${config.public.backendUrl}${prop.image_url}`
    }
  )

  const { open, onChange } = useFileDialog({
    accept: "image/*", // Set to accept only image files
    multiple: false,
  })

  onChange((files) => {
    file.value = files?.[0] as File
    src.value = files?.[0] ? URL.createObjectURL(files?.[0]) : ""
  })

  function onDrop(files: File[] | null) {
    file.value = files?.[0] as File
    src.value = files?.[0] ? URL.createObjectURL(files?.[0]) : ""
  }

  const { isOverDropZone } = useDropZone(dropZoneRef, onDrop)

  const submit = async () => {
    try {
      const formData = new FormData()
      formData.append("title", title.value)
      formData.append("description", description.value)
      formData.append("date_time", date.value.toISOString())
      formData.append("location", location.value)
      if (file.value) {
        formData.append("image", file.value)
      }

      await useSanctumFetch(`/api/event-posts/${props.event.id}`, {
        method: "PATCH",
        body: formData,
      })

      toast({
        title: "The event has been uploaded successfully.",
        duration: 1500,
      })
      emit("update")
      togglePioEditEventDialog.value = false
    } catch (e) {
      if (e instanceof FetchError && e.response?.status === 422) {
        const error = (Object.values(e.response?._data.errors as { [key: string]: string[] })[0] as string[])[0]
        toast({
          title: "Uh oh! Something went wrong.",
          description: error,
          variant: "destructive",
        })
      }
    }
  }
</script>

<template>
  <Dialog v-model:open="togglePioEditEventDialog">
    <DialogContent class="max-w-[50rem]">
      <DialogHeader>
        <DialogTitle>Edit Event </DialogTitle>
        <DialogDescription>Drag and drop or browse to upload an image. Supported image types are jpg/png.</DialogDescription>
      </DialogHeader>

      <div class="grid grid-cols-5 gap-4">
        <div class="col-span-2">
          <Label>File</Label>
          <Card v-if="!src" id="file" ref="dropZoneRef" class="cursor-pointer" @click="open">
            <CardContent class="shadow-sm border rounded-md p-4 aspect-square">
              <div
                class="border border-dashed border-black rounded-sm flex items-center justify-center text-center h-full"
                :class="{ 'bg-gray-100': isOverDropZone }"
              >
                <div class="text-muted-foreground select-none">
                  <div class="flex justify-center">
                    <component :is="CloudUpload" />
                  </div>
                  <h6>Drag and drop image or click to browse</h6>
                </div>
              </div>
            </CardContent>
          </Card>

          <Card v-else ref="dropZoneRef" class="aspect-square" @click="open">
            <NuxtImg :src="src" alt="image" class="rounded-md object-cover w-full h-full" />
          </Card>
          <Badge v-if="src" variant="secondary" class="absolute"> Note: Click image to change. </Badge>
        </div>

        <div class="col-span-3 flex flex-col gap-1.5 place-items-start">
          <div class="grid w-full items-center gap-2">
            <Label for="event-title">Title</Label>
            <Input id="event-title" v-model="title" placeholder="Write Here..." class="shadow-sm" />
          </div>

          <div class="grid w-full items-center gap-2">
            <Label for="event-location">Location</Label>
            <Input id="event-location" v-model="location" placeholder="Bicol University, Main Campus" class="shadow-sm" />
          </div>

          <div class="grid w-full items-center gap-2">
            <Label for="event-title">Date Time</Label>
            <VueDatePicker
              id="event-date"
              v-model="date"
              time-picker-inline
              offset="-200"
              auto-position="top"
              :is24="false"
              :month-change-on-scroll="false"
            />
          </div>

          <div class="w-full gap-2 flex flex-col flex-1 items-start">
            <Label for="event-desc">Description</Label>
            <Textarea id="event-desc" v-model="description" placeholder="Write Here..." class="shadow-sm h-full" />
          </div>
        </div>
      </div>

      <DialogFooter>
        <Button @click="submit">Update</Button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
