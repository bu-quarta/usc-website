<script setup lang="ts">
  const { data: reports } = await useAsyncData<Report[]>("reports", () => useSanctumFetch("/api/reports"))

  const reportTypeOrder = ["narrative", "liquidation", "financial", "audit", "evaluation", "glc", "other"]

  const groupedReports = reportTypeOrder.reduce((acc, type) => {
    acc[type] = []
    return acc
  }, {} as Record<string, Report[]>)

  reports?.value?.forEach((report) => {
    const type = report.type.toLowerCase()
    if (groupedReports[type]) {
      groupedReports[type].push(report)
    }
  })
</script>

<template>
  <div class="container px-16">
    <section id="usc_reports" class="pb-8 space-y-4">
      <h1 class="text-xl font-bold">USC Reports</h1>

      <h5 class="max-w-[60rem]">
        In the spirit of accountable leadership and transparent governance, this section provides access to essential council documents,
        including official narrative reports, liquidation statements, financial records, audit findings, evaluation summaries of events,
        General Legislative Council (GLC) resolutions, and other relevant council files.
      </h5>
    </section>

    <template v-for="(_reports, type) in groupedReports" :key="type">
      <section class="pb-8">
        <TitleSeparator class="capitalize">
          <span :class="type == 'glc' ? 'uppercase' : ''">{{ type }}</span> reports
        </TitleSeparator>
        <div class="grid grid-cols-3 mt-8 gap-4 px-6">
          <template v-for="report in _reports" :key="report">
            <ReportCard :report="report" />
          </template>
        </div>
      </section>
    </template>
  </div>
</template>

<style scoped></style>
