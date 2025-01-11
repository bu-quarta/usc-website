<script setup lang="ts">
  const { togglePioDeleteReportDialog } = useStates()

  const props = defineProps<{ id: number }>()
</script>

<template>
  <AlertDialog v-model:open="togglePioDeleteReportDialog">
    <AlertDialogContent class="w-max">
      <AlertDialogHeader class="mx-auto">
        <AlertDialogTitle class="text-center">Delete Report?</AlertDialogTitle>
        <Separator />
        <AlertDialogDescription> Are you sure you want to delete this report? </AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter class="sm:justify-between mt-4">
        <AlertDialogCancel class="px-10">Cancel</AlertDialogCancel>
        <AlertDialogAction class="px-10 bg-[#ef4444] hover:bg-[#ef5555]">Delete</AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>

<style scoped></style>
