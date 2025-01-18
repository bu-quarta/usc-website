<script setup lang="ts">
  import { FetchError } from "ofetch"
  import { useFileDialog, useDropZone } from "@vueuse/core"
  import { useToast } from "@/components/ui/toast/use-toast"

  const emit = defineEmits(["upload"])

  const { togglePioUploadNewsAndUpdateDialog } = useStates()
  const dropZoneRef = ref<HTMLDivElement>()
  const { toast } = useToast()

  const title = ref()
  const description = ref()
  const file = ref<File | null>(null)
  const src = ref<string>("")

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
      if (file.value) {
        formData.append("image", file.value)
      }

      await useSanctumFetch("/api/news-updates", {
        method: "POST",
        body: formData,
      })

      toast({
        title: "The event has been uploaded successfully.",
        duration: 1500,
      })
      title.value = ""
      description.value = ""
      file.value = null
      src.value = ""
      emit("upload")
      togglePioUploadNewsAndUpdateDialog.value = false
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
  <Dialog v-model:open="togglePioUploadNewsAndUpdateDialog">
    <DialogContent class="max-w-[40rem]">
      <DialogHeader>
        <DialogTitle>Create Post </DialogTitle>
        <DialogDescription>Drag and drop or browse to upload an image. Supported image types are jpg/png.</DialogDescription>
      </DialogHeader>

      <div class="grid grid-cols-5 gap-4">
        <div class="col-span-2">
          <Label for="file">File</Label>
          <Card v-if="!file" id="file" ref="dropZoneRef" class="cursor-pointer" @click="open">
            <CardContent class="shadow-sm border rounded-md p-4 aspect-square">
              <div
                class="border border-dashed border-black rounded-sm flex items-center justify-center text-center h-full"
                :class="{ 'bg-gray-100': isOverDropZone }"
              >
                <div class="text-muted-foreground select-none">
                  <Icon name="lucide:cloud-upload" class="text-2xl" />
                  <h6>Drag and drop image or click to browse</h6>
                </div>
              </div>
            </CardContent>
          </Card>

          <Card v-else ref="dropZoneRef" class="aspect-square" @click="open">
            <NuxtImg :src="src" alt="image" class="rounded-md object-cover w-full h-full" />
          </Card>
          <Badge v-if="file" variant="secondary" class="absolute"> Note: Click image to change. </Badge>
        </div>

        <div class="col-span-3 flex flex-col gap-1.5 place-items-start">
          <div class="grid w-full items-center gap-2">
            <Label for="news-and-update-title">Title</Label>
            <Input id="news-and-update-title" v-model="title" placeholder="Write Here..." class="shadow-sm" />
          </div>

          <div class="w-full gap-2 flex flex-col flex-1 items-start">
            <Label for="news-and-update-desc">Description</Label>
            <Textarea id="news-and-update-desc" v-model="description" placeholder="Write Here..." class="shadow-sm h-full" />
          </div>
        </div>
      </div>

      <DialogFooter>
        <Button @click="submit">Upload</Button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
