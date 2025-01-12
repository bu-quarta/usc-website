<script setup lang="ts">
  definePageMeta({
    layout: "pio",
  })

  const { togglePioUploadEventDialog } = useStates()
  const dates = ["September 12, 2024", "September 11, 2024", "September 10, 2024"]
</script>

<template>
  <div>
    <div class="text-right">
      <Button @click="togglePioUploadEventDialog = true">
        <Icon name="material-symbols:upload" class="text-lg" />
        <span>Upload</span>
      </Button>
    </div>
    <div class="space-y-8">
      <template v-for="date in dates" :key="date">
        <div>
          <div class="flex items-center gap-4 pb-4">
            <h5 class="font-bold">{{ date }}</h5>
            <Separator class="flex-1" />
          </div>
          <div class="grid grid-cols-3 gap-4">
            <template v-for="i in 5" :key="i">
              <PioEventCard />
            </template>
          </div>
        </div>
      </template>
    </div>

    <PioDeleteEventDialog :id="1" />
    <PioUploadEventDialog />
    <PioEditEventDialog />
  </div>
</template>

<style scoped></style>
