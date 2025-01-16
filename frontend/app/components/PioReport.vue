<script setup lang="ts">
  import { formatReportId } from "~/lib/utils"

  const { togglePioUploadReportDialog, togglePioEditReportDialog, togglePioDeleteReportDialog } = useStates()
  const props = defineProps<{
    type: "financial-reports" | "audit-reports" | "accomplishment-records" | "glc-resolutions" | "other-documents"
  }>()

  const reportType = props.type.split("-")[0]

  const { data, refresh } = await useAsyncData<Report[]>("reports", () =>
    useSanctumFetch(`/api/reports`, {
      query: {
        type: reportType,
      },
    })
  )

  const _report = ref<Report>()
  const config = useRuntimeConfig()
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
        <TableBody v-if="!!data?.length">
          <template v-for="report in data" :key="report">
            <TableRow>
              <TableCell class="font-medium"> DOC-{{ formatReportId(report.id) }} </TableCell>
              <TableCell>{{ report.title }}</TableCell>
              <TableCell>{{ report.date_time }}</TableCell>
              <TableCell class="text-right space-x-1.5">
                <NuxtLink :to="`${config.public.backendUrl}${report?.file_url}`">
                  <Button size="sm">
                    <Icon name="lets-icons:view-alt-light" class="text-lg mt-0.5" />
                    <span class="sr-only">View</span>
                  </Button>
                </NuxtLink>
                <Button
                  size="sm"
                  variant="secondary"
                  @click="
                    () => {
                      _report = report
                      togglePioEditReportDialog = true
                    }
                  "
                >
                  <Icon name="basil:edit-outline" class="text-lg mt-0.5" />
                  <span class="sr-only">Edit</span>
                </Button>
                <Button
                  size="sm"
                  variant="destructive"
                  @click="
                    () => {
                      _report = report
                      togglePioDeleteReportDialog = true
                    }
                  "
                >
                  <Icon name="material-symbols:delete-outline-rounded" class="text-lg mt-0.5" />
                  <span class="sr-only">Delete</span>
                </Button>
              </TableCell>
            </TableRow>
          </template>
        </TableBody>
        <TableBody v-else>
          <TableRow>
            <TableCell colSpan="4" class="text-center h-40 border-b">No records found </TableCell>
          </TableRow>
        </TableBody>
      </Table>
    </div>

    <PioUploadReportDialog :type="type" @upload="refresh()" />
    <PioEditReportDialog :report="_report as Report" @update="refresh()" />
    <PioDeleteReportDialog :report-id="_report?.id as number" @delete="refresh()" />
  </div>
</template>

<style scoped></style>
