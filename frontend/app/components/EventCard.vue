<script setup lang="ts">
  defineProps({
    pastEvents: {
      type: Boolean,
      default: false,
    },
  })
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <Skeleton class="aspect-[4/5]" />

      <div class="space-y-4 text-xs">
        <div class="space-y-2 mt-4">
          <Label class="font-medium uppercase text-xs text-[#EA3333]" v-if="!pastEvents">Upcoming</Label>
          <p class="text-lg font-semibold leading-5">Praesentium sed in corrupti odit architecto</p>
          <p>SEPTEMBER 15, 2024</p>
        </div>
        <div class="flex items-start gap-1">
          <Icon name="mdi:location" class="size-4" />
          <p>Bicol University Main Campus</p>
        </div>

        <Button size="sm" v-if="pastEvents">
          <p>Evaluate</p>
          <Icon name="lucide:pencil" />
        </Button>
      </div>
    </CardContent>
  </Card>
</template>

<style scoped></style>
