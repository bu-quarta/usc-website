<script setup lang="ts">
  import DialogDescription from "./ui/dialog/DialogDescription.vue"

  const { toggleLoginDialog, loginDialogShown } = useStates()
  const { isLoggedIn } = useSanctum()

  onMounted(() => {
    if (!isLoggedIn.value && !loginDialogShown.value) {
      toggleLoginDialog.value = true
    }
  })

  watch(toggleLoginDialog, (value) => {
    if (value === false) {
      loginDialogShown.value = true
    }
  })
</script>

<template>
  <Dialog v-model:open="toggleLoginDialog">
    <DialogContent class="w-96">
      <DialogHeader class="flex justify-center items-center">
        <div class="aspect-square">
          <NuxtImg src="/images/usc-logo.jpg" />
        </div>
        <div class="leading-tight text-center">
          <DialogDescription>Welcome to the BU USC Website!</DialogDescription>
          <DialogTitle class="text-xl">Log in using your BU Account</DialogTitle>
        </div>
      </DialogHeader>

      <Button class="bg-[linear-gradient(260deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)] py-2">
        <span class="bg-white rounded-full flex p-0.5"><Icon name="logos:google-icon" size="20" /></span>
        Sign in with Google
      </Button>

      <Separator class="my-2" label="Or" />

      <Button class="bg-[#555555] hover:bg-[#555555] py-2 mb-8" @click="toggleLoginDialog = false">
        <span class="rounded-full flex p-1"><Icon name="qlementine-icons:user-16" size="24" /></span>
        Continue as Guest
      </Button>
    </DialogContent>
  </Dialog>
</template>

<style scoped></style>
