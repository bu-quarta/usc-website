<script setup lang="ts">
  import VueDatePicker from "@vuepic/vue-datepicker"
  import "@vuepic/vue-datepicker/dist/main.css"

  const { togglePioUploadEventDialog } = useStates()

  const date = ref(new Date())
</script>

<template>
  <Dialog v-model:open="togglePioUploadEventDialog">
    <DialogContent class="max-w-[40rem]">
      <DialogHeader>
        <DialogTitle>Create Event </DialogTitle>
        <DialogDescription>Drag and drop or browse to upload an image. Supported image types are jpg/png.</DialogDescription>
      </DialogHeader>

      <div class="grid grid-cols-5 gap-4">
        <div class="col-span-2">
          <Label for="file">File</Label>
          <Card id="file" class="cursor-pointer">
            <CardContent class="shadow-sm bordver rounded-md p-4 aspect-square">
              <div class="border border-dashed border-black rounded-sm flex items-center justify-center text-center h-full">
                <div class="text-muted-foreground select-none">
                  <Icon name="et:upload" class="text-2xl" />
                  <h6>Drag and drop image or click to browse</h6>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>

        <div class="col-span-3 flex flex-col gap-1.5 place-items-start">
          <div class="grid w-full items-center gap-2">
            <Label for="event-title">Title</Label>
            <Input id="event-title" placeholder="Write Here..." class="shadow-sm" />
          </div>

          <div class="grid w-full items-center gap-2">
            <Label for="event-title">Date Time</Label>
            <VueDatePicker
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
            <Textarea id="event-desc" placeholder="Write Here..." class="shadow-sm h-full" />
          </div>
        </div>
      </div>

      <DialogFooter> <Button>Upload</Button> </DialogFooter>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
