<script setup lang="ts">
  defineProps<{ report: Report }>()
</script>

<template>
  <Card>
    <CardContent class="py-4">
      <div class="space-y-1">
        <div class="flex">
          <h5 class="font-medium flex-1">{{ report.title }}</h5>
          <div class="p-2 bg-[#FFEAC4] w-6 h-6 flex items-center justify-center rounded-full cursor-pointer">
            <Icon name="material-symbols:download-rounded" class="flex-none text-primary" />
          </div>
        </div>
        <h6 class="font-light">Updated on {{ report.date }}</h6>
        <div v-if="report.status" class="w-max">
          <h6 v-if="report.status == 'Approved'" class="text-[#00A727] bg-[#D6FFE0] p-2 rounded-sm">{{ report.status }}</h6>
          <h6 v-else class="text-[#EA3333] bg-[#FFE6E6] p-2 rounded-sm">{{ report.status }}</h6>
        </div>
      </div>
      <NuxtLink :to="report.report_url">
        <Button variant="link" size="sm" class="p-0 text-[#0099CB]">View Document</Button>
      </NuxtLink>
    </CardContent>
  </Card>
</template>

<style scoped></style>
