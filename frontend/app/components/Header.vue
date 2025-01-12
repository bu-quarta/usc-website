<script setup lang="ts">
  const { toggleLoginDialog } = useStates()

  const user = useCurrentUser<User>()
  const hasRole = computed(() => user.value?.roles && user.value.roles.length > 0)
</script>

<template>
  <header class="container px-16 flex justify-between items-center">
    <div class="flex items-center justify-center">
      <div class="">
        <NuxtImg src="/images/usc-logo.jpg" sizes="80" />
      </div>
      <div>
        <p class="grid leading-tight text-sm">
          <span>BICOL UNIVERSITY</span>
          <span class="font-bold">UNIVERSITY STUDENT COUNCIL</span>
        </p>
      </div>
    </div>
    <Menubar class="border-none gap-2">
      <MenubarMenu>
        <NuxtLink to="/">
          <MenubarTrigger>Home </MenubarTrigger>
        </NuxtLink>
      </MenubarMenu>
      <MenubarMenu>
        <MenubarTrigger class="gap-1">About <Icon name="prime:sort-down-fill" :size="16" /> </MenubarTrigger>
        <MenubarContent class="max-w-10">
          <MenubarItem>
            <NuxtLink to="/usc" class="w-full"> University Student Council </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/office-of-the-csr" class="w-full"> Office of the Chairperson and Student Regent </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/devs" class="w-full"> Meet the Developers </NuxtLink>
          </MenubarItem>
        </MenubarContent>
      </MenubarMenu>
      <MenubarMenu>
        <MenubarTrigger>Iskommunity <Icon name="prime:sort-down-fill" :size="16" /></MenubarTrigger>
        <MenubarContent>
          <MenubarItem>
            <NuxtLink to="/events" class="flex justify-between w-full"> <span>USC Events</span> <Badge>99+</Badge></NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/news-and-updates" class="w-full"> News and Updates </NuxtLink>
          </MenubarItem>
          <MenubarSeparator />
          <MenubarItem>
            <NuxtLink to="/reports" class="w-full"> Reports </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/document-tracking" class="w-full"> Track my Document </NuxtLink>
          </MenubarItem>
        </MenubarContent>
      </MenubarMenu>
      <MenubarMenu>
        <NuxtLink to="/faqs">
          <MenubarTrigger>FAQs </MenubarTrigger>
        </NuxtLink>
      </MenubarMenu>
      <MenubarMenu>
        <NuxtLink to="/citizens-charter">
          <MenubarTrigger>Citizen's Charter </MenubarTrigger>
        </NuxtLink>
      </MenubarMenu>
      <MenubarMenu v-if="!user">
        <MenubarTrigger class="focus:bg-inherit data-[state=open]:bg-inherit">
          <Button as="div" class="hover:cursor-pointer" @click="toggleLoginDialog = true"> Log in </Button>
        </MenubarTrigger>
      </MenubarMenu>
      <MenubarMenu v-if="hasRole">
        <MenubarTrigger class="focus:bg-inherit data-[state=open]:bg-inherit">
          <Button as="div" class="hover:cursor-pointer" @click="navigateTo(`/management/${user?.roles[0]}`)"> Dashboard </Button>
        </MenubarTrigger>
      </MenubarMenu>
    </Menubar>
  </header>
</template>
