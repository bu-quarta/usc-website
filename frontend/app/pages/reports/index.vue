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
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur ipsa magni perspiciatis quas dolorem adipisci ducimus error
        cupiditate voluptatibus doloribus dolore aliquam distinctio sed molestiae, veniam repellat id quidem veritatis. Lorem ipsum, dolor
        sit amet consectetur adipisicing elit. Doloremque tenetur soluta neque voluptatem ducimus corporis cumque quasi, blanditiis vel
        dolores consequatur. Fugit vitae, praesentium voluptatum doloribus sit itaque fuga odit?
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
