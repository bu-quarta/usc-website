<script setup lang="ts">
  const reports = ref<Report[]>([
    {
      type: "Narrative Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Narrative Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Narrative Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Liquidation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Liquidation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Liquidation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Financial Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Financial Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Financial Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Audit Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Audit Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Audit Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Evaluation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Evaluation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Evaluation Reports",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "GLC Resolutions",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      status: "Approved",
      report_url: "#",
    },

    {
      type: "GLC Resolutions",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      status: "Approved",
      report_url: "#",
    },
    {
      type: "GLC Resolutions",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      status: "Lost",
      report_url: "#",
    },
    {
      type: "Others",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Others",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
    {
      type: "Others",
      title: "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
      date: "September 15, 2024",
      report_url: "#",
    },
  ] as Report[])

  const groupedReports = reports.value.reduce((acc, report) => {
    if (!acc[report.type]) {
      acc[report.type] = []
    }
    acc[report.type]?.push(report)
    return acc
  }, {} as Record<string, Report[]>)
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
        <TitleSeparator>{{ type }} Reports</TitleSeparator>
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
