<script setup lang="ts">
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
  <div>
    <div>
      <div class="container">
        <Header />
      </div>
      <slot />

      <footer>footer</footer>
    </div>
    <Dialog v-model:open="toggleLoginDialog">
      <DialogContent>
        <DialogHeader class="gap-0">
          <DialogDescription> To continue with your request, </DialogDescription>
          <DialogTitle class="text-2xl">Login using your <span class="text-[#0099cb]"> BU Email Account </span></DialogTitle>
          <DialogDescription class="my-2 font-semibold">
            Please use your personal BU email address and not your offce or organizational email.
          </DialogDescription>
        </DialogHeader>

        <Button class="bg-[#0099cb] py-2">
          <span class="bg-white rounded-full flex p-1"><Icon name="logos:google-icon" size="20" /></span>
          Sign in with Google
        </Button>

        <Separator class="mt-6 mb-8" label="Or" />

        <div class="grid grid-cols-2 gap-4">
          <Card class="shadow-lg">
            <CardHeader>
              <CardTitle class="text-md">BU Email Creation </CardTitle>
              <CardDescription>
                Don't have BU Email account yet? <br />
                Request an account here.
              </CardDescription>
            </CardHeader>

            <CardFooter>
              <Button class="gap-2 hover:no-underline p-0" variant="link">
                <span>Create Account</span>
                <span class="mt-1.5"> <Icon name="cil:arrow-right" /></span>
              </Button>
            </CardFooter>
          </Card>
          <Card class="shadow-lg">
            <CardHeader>
              <CardTitle class="text-md">Forgot Password </CardTitle>
              <CardDescription>
                Forgot your BU email password? <br />
                Request a reset here.
              </CardDescription>
            </CardHeader>

            <CardFooter>
              <Button class="gap-2 hover:no-underline p-0" variant="link">
                <span>Reset Password</span>
                <span class="mt-1.5"> <Icon name="cil:arrow-right" /></span>
              </Button>
            </CardFooter>
          </Card>
        </div>
      </DialogContent>
    </Dialog>
  </div>
</template>

<style scoped></style>
