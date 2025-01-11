<script setup lang="ts">
  const { togglePioEditReportDialog } = useStates()

  const props = defineProps<{ id: number }>()
</script>

<template>
  <Dialog v-model:open="togglePioEditReportDialog">
    <DialogContent>
      <DialogHeader>
        <DialogTitle>Edit Report </DialogTitle>
        <DialogDescription>Drag and drop or browse to edit a report. Supported file type is PDF.</DialogDescription>
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

      <DialogFooter> <Button>Update</Button> </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
