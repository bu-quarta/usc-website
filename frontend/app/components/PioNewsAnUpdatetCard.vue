<script setup lang="ts">
  const { togglePioDeleteNewsAndUpdateDialog, togglePioEditNewsAndUpdateDialog } = useStates()
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <Skeleton class="aspect-[3/2]" />

      <CardHeader class="px-0 py-2">
        <CardTitle class="text-lg leading-tight line-clamp-2">Praesentium sed in corrupti odit architecto </CardTitle>
        <h5 :class="`line-clamp-2 font-light leading-tight `">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis Lorem ipsum dolor sit amet,
          consectetur adipisicing elit. Consectetur, unde ipsa esse rem consequuntur fugit dolorum tempore at fugiat, eius neque expedita
          totam asperiores iusto ad, natus assumenda rerum quod.
        </h5>
        <CardDescription class="text-xs">SEPTEMBER 15, 20241 | 1:00 PM </CardDescription>
      </CardHeader>
      <div class="flex gap-2">
        <Button size="sm" @click="togglePioEditNewsAndUpdateDialog = true">
          <Icon name="basil:edit-outline" class="-mt-0.5" />
          <span>Edit</span>
        </Button>
        <Button size="sm" variant="destructive" @click="togglePioDeleteNewsAndUpdateDialog = true">
          <Icon name="material-symbols:delete-outline-rounded" class="-mt-0.5" />
          <span>Delete</span>
        </Button>
      </div>
    </CardContent>
  </Card>
</template>

<style scoped></style>
