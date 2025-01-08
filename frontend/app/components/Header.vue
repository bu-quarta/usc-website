<script setup lang="ts">
  const { toggleLoginDialog } = useStates()
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
            <NuxtLink to="/usc"> University Student Council </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/office-of-the-csr"> Office of the Chairperson and Student Regent </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="/devs"> Meet the Developers </NuxtLink>
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
            <NuxtLink to="/news-and-updates"> News and Updates </NuxtLink>
          </MenubarItem>
          <MenubarSeparator />
          <MenubarItem>
            <NuxtLink to="/reports"> Reports </NuxtLink>
          </MenubarItem>
          <MenubarItem>
            <NuxtLink to="newtab"> Track my Document </NuxtLink>
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
      <MenubarMenu>
        <MenubarTrigger class="focus:bg-inherit data-[state=open]:bg-inherit">
          <Button as="div" class="hover:cursor-pointer" @click="toggleLoginDialog = true"> Log in </Button>
        </MenubarTrigger>
      </MenubarMenu>
    </Menubar>
  </header>
</template>
