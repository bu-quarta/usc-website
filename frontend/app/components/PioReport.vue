<script setup lang="ts">
  const { togglePioUploadReportDialog, togglePioEditReportDialog, togglePioDeleteReportDialog } = useStates()
  const props = defineProps<{
    type: "financial-reports" | "audit-reports" | "accomplishment-records" | "glc-resolutions" | "other-documents"
  }>()
</script>

<template>
  <div class="space-y-2">
    <div class="text-right">
      <Button @click="togglePioUploadReportDialog = true">
        <Icon name="material-symbols:upload" class="text-lg" />
        <span>Upload</span>
      </Button>
    </div>
    <div>
      <Table>
        <TableCaption />
        <TableHeader class="border-t">
          <TableRow>
            <TableHead> ID </TableHead>
            <TableHead>Title</TableHead>
            <TableHead>Updated</TableHead>
            <TableHead class="text-right"> Action </TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          <template v-for="i in 10" :key="i">
            <TableRow>
              <TableCell class="font-medium"> DOC001 </TableCell>
              <TableCell>{{ type }}</TableCell>
              <TableCell>Sept. 12, 2024 | 1:00 P.M.</TableCell>
              <TableCell class="text-right space-x-1.5">
                <Button size="sm">
                  <Icon name="lets-icons:view-alt-light" class="text-lg mt-0.5" />
                  <span class="sr-only">View</span>
                </Button>
                <Button size="sm" variant="secondary" @click="togglePioEditReportDialog = true">
                  <Icon name="basil:edit-outline" class="text-lg mt-0.5" />
                  <span class="sr-only">Edit</span>
                </Button>
                <Button size="sm" variant="destructive" @click="togglePioDeleteReportDialog = true">
                  <Icon name="material-symbols:delete-outline-rounded" class="text-lg mt-0.5" />
                  <span class="sr-only">Delete</span>
                </Button>
              </TableCell>
            </TableRow>
          </template>
        </TableBody>
      </Table>
    </div>

    <PioUploadReportDialog :type="type" />
    <PioEditReportDialog :id="1" />
    <PioDeleteReportDialog :id="1" />
  </div>
</template>

<style scoped></style>
