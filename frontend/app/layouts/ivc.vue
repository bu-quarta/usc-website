<script setup lang="ts">
  import { Calendar, LayoutDashboard, LogOut } from "lucide-vue-next"
  import Test from "~/assets/icons/test.svg"

  const route = useRoute()
  const lastRoute = route.path.split("/").pop()

  const routeDic: { [key: string]: string } = {
    "file-tracking": "File Tracking",
  }
</script>

<template>
  <div class="container relative">
    <SidebarProvider class="select-none">
      <Sidebar collapsible="icon" class="absolute">
        <SidebarHeader class="">
          <SidebarMenu>
            <SidebarMenuItem>
              <SidebarMenuButton as-child>
                <!-- <component :is="Test" /> -->
                <NuxtLink to="">
                  <span>USC IVC</span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenuItem>
          </SidebarMenu>
        </SidebarHeader>
        <SidebarContent>
          <SidebarGroup>
            <SidebarGroupLabel class="hidden" />
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="Dashboard" class="hover:bg-muted">
                <NuxtLink to="/management/ivc/">
                  <component :is="LayoutDashboard" />
                  <span> Dashbaord </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="File Tracking" class="hover:bg-muted">
                <NuxtLink to="/management/ivc/file-tracking">
                  <component :is="Calendar" />
                  <span> File Tracking </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
          </SidebarGroup>
        </SidebarContent>
        <SidebarFooter>
          <SidebarMenu>
            <SidebarMenuButton as-child tooltip="Logout" class="hover:bg-muted">
              <NuxtLink to="/management/">
                <component :is="LogOut" class="rotate-180" />
                <span>Logout</span>
              </NuxtLink>
            </SidebarMenuButton>
          </SidebarMenu>
        </SidebarFooter>
        <SidebarRail />
      </Sidebar>
      <SidebarInset>
        <header
          class="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12"
        >
          <div class="flex items-center gap-2 -ml-4">
            <SidebarTrigger class="-ml-1" />
            <Separator orientation="vertical" class="mr-2 h-4" />
            <h5>{{ routeDic[lastRoute as string] ?? "Dashboard" }}</h5>
          </div>
        </header>
      </SidebarInset>
    </SidebarProvider>
  </div>
</template>
