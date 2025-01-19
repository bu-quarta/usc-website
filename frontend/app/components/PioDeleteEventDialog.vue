<script setup lang="ts">
  const { togglePioDeleteEventDialog } = useStates()

  const props = defineProps<{ eventId: number }>()
  const emit = defineEmits(["delete"])

  const deleteEvent = async () => {
    await useSanctumFetch(`/api/event-posts/${props.eventId}`, {
      method: "DELETE",
    })
    emit("delete")
    togglePioDeleteEventDialog.value = false
  }
</script>

<template>
  <AlertDialog v-model:open="togglePioDeleteEventDialog">
    <AlertDialogContent class="w-max">
      <AlertDialogHeader class="mx-auto">
        <AlertDialogTitle class="text-center">Delete Content?</AlertDialogTitle>
        <Separator />
        <AlertDialogDescription> Are you sure you want to delete this content? </AlertDialogDescription>
      </AlertDialogHeader>
      <AlertDialogFooter class="sm:justify-between mt-4">
        <AlertDialogCancel class="px-10">Cancel</AlertDialogCancel>
        <AlertDialogAction class="px-10 bg-[#ef4444] hover:bg-[#ef5555]" @click="deleteEvent">Delete</AlertDialogAction>
      </AlertDialogFooter>
    </AlertDialogContent>
  </AlertDialog>
</template>

<style scoped></style>
