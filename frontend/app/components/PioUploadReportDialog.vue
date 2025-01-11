<script setup lang="ts">
  const { togglePioUploadReportDialog } = useStates()

  const props = defineProps<{
    type: "financial-reports" | "audit-reports" | "accomplishment-records" | "glc-resolutions" | "other-documents"
  }>()
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
        <Input id="document-name" placeholder="Write Here..." class="shadow-sm" />
      </div>

      <div>
        <Label for="file">File</Label>
        <Card id="file" class="cursor-pointer">
          <CardContent class="shadow-sm border rounded-md p-4">
            <div class="border border-dashed border-black rounded-sm h-32 flex items-center justify-center text-center">
              <div class="text-muted-foreground select-none">
                <Icon name="et:upload" class="text-2xl" />
                <h6>Drag and drop file or click to browse</h6>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>

      <DialogFooter> <Button>Upload</Button> </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
