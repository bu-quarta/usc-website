<script setup lang="ts">
  import { FetchError } from "ofetch"
  import { useFileDialog, useDropZone } from "@vueuse/core"
  import { useToast } from "@/components/ui/toast/use-toast"

  const props = defineProps<{
    type: "financial-reports" | "audit-reports" | "accomplishment-records" | "glc-resolutions" | "other-documents"
  }>()
  const emit = defineEmits(["upload"])

  const { togglePioUploadReportDialog } = useStates()
  const reportType = props.type.split("-")[0]
  const dropZoneRef = ref<HTMLDivElement>()
  const { toast } = useToast()

  const title = ref()
  const file = ref<File | null>(null)

  const { open, reset, onChange } = useFileDialog({
    accept: "application/pdf", // Set to accept only image files
    multiple: false,
  })

  onChange((files) => {
    file.value = files?.[0] as File
  })

  function onDrop(files: File[] | null) {
    file.value = files?.[0] as File
  }

  const { isOverDropZone } = useDropZone(dropZoneRef, onDrop)

  const submit = async () => {
    try {
      if (!file.value) {
        throw new Error("Please select a file to upload.")
      }

      const formData = new FormData()
      formData.append("type", reportType as string)
      formData.append("file", file.value)
      formData.append("name", title.value)

      await useSanctumFetch("/api/pio/reports", {
        method: "POST",
        body: formData,
      })

      toast({
        title: "The report has been uploaded successfully.",
        duration: 1500,
      })
      file.value = null
      reset()
      title.value = ""
      emit("upload")
      togglePioUploadReportDialog.value = false
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
  <Dialog v-model:open="togglePioUploadReportDialog">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>Upload Report </DialogTitle>
        <DialogDescription>Drag and drop or browse to upload a report. Supported file type is PDF.</DialogDescription>
      </DialogHeader>

      <div class="grid w-full items-center gap-2">
        <Label for="document-name">Title</Label>
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
              ><Icon name="ic:baseline-clear"
            /></Button>
          </CardContent>
        </Card>
      </div>

      <DialogFooter>
        <Button @click="submit">Upload</Button>
      </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped>
  .card-content {
    pointer-events: none;
  }

  .drop-zone {
    pointer-events: auto;
  }
</style>
