<script setup lang="ts">
  import { FetchError } from "ofetch"
  import { useFileDialog, useDropZone } from "@vueuse/core"
  import { useToast } from "@/components/ui/toast/use-toast"

  interface Report {
    id: number
    title: string
    date_time: string
  }

  const props = withDefaults(defineProps<{ report: Report }>(), {
    report: () => ({
      id: 0,
      title: "",
      date_time: "",
    }),
  })
  const emit = defineEmits(["update"])

  const { togglePioEditReportDialog } = useStates()
  const dropZoneRef = ref<HTMLDivElement>()
  const { toast } = useToast()

  const { open, reset, onChange } = useFileDialog({
    accept: "application/pdf", // Set to accept only image files
    multiple: false,
  })

  const file = ref<File | null>(null)
  const title = ref(props.report.title)

  watch(
    () => props.report.title,
    (newTitle) => {
      title.value = newTitle
    }
  )

  onChange((files) => {
    file.value = files?.[0] as File
  })

  function onDrop(files: File[] | null) {
    file.value = files?.[0] as File
  }

  const { isOverDropZone } = useDropZone(dropZoneRef, onDrop)

  const submit = async () => {
    try {
      const formData = new FormData()
      if (file.value) {
        formData.append("file", file.value)
      }
      formData.append("name", title.value)

      await useSanctumFetch(`/api/pio/reports/${props.report.id}`, {
        method: "patch",
        body: formData,
      })

      toast({
        title: "The report has been uploaded successfully.",
        duration: 1500,
      })
      file.value = null
      reset()
      title.value = ""
      emit("update")
      togglePioEditReportDialog.value = false
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
  <Dialog v-model:open="togglePioEditReportDialog">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>Edit Report </DialogTitle>
        <DialogDescription>Drag and drop or browse to edit a report. Supported file type is PDF.</DialogDescription>
      </DialogHeader>

      <div class="grid w-full items-center gap-2">
        <Label for="document-name">Title </Label>
        <Input id="document-name" v-model="title" placeholder="Write Here..." class="shadow-sm" />
      </div>

      <div>
        <Label for="file">File</Label>
        <Card v-if="!file" id="file" ref="dropZoneRef" class="cursor-pointer" @click="open">
          <CardContent class="shadow-sm rounded-md p-4">
            <div
              class="border border-dashed border-black rounded-sm h-32 flex items-center justify-center text-center"
              :class="{ 'bg-gray-100': isOverDropZone }"
            >
              <div class="text-muted-foreground select-none">
                <Icon name="lucide:cloud-upload" class="text-2xl" />
                <h6>Drag and drop file or click to browse</h6>
              </div>
            </div>

            <Badge variant="outline" class="mt-2">Note: Do not upload if no changes to the PDF are needed.</Badge>
          </CardContent>
        </Card>

        <Card v-else>
          <CardContent class="py-4 flex items-center select-none gap-1 w-full">
            <div class="flex items-center">
              <Icon name="proicons:pdf" />
            </div>
            <h5 class="line-clamp-1 grow">
              {{ file.name }}
            </h5>
            <Button
              variant="ghost"
              class="flex-none"
              @click="
                () => {
                  file = null
                  reset()
                }
              "
            >
              <Icon name="ic:baseline-clear" />
            </Button>
          </CardContent>
        </Card>
      </div>

      <DialogFooter>
        <Button @click="submit">Update</Button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
