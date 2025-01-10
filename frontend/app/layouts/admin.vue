<script setup lang="ts">
  import { Calendar, ChartNoAxesColumnIncreasing, ChevronRight, LayoutDashboard, LogOut } from "lucide-vue-next"
  import Test from "~/assets/icons/test.svg"

  const activity_logs = [
    {
      title: "USC P.I.O",
      url: "/management/admin/activity-logs/usc-pio",
    },
    {
      title: "USC IVC",
      url: "/management/admin/activity-logs/usc-ivc",
    },
  ]

  const route = useRoute()
  const lastRoute = route.path.split("/").pop()

  const routeDic: { [key: string]: string } = {
    "usc-pio": "USC P.I.O",
    "usc-ivc": "USC IVC",
    events: "Events",
    posts: "Posts",
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
                <NuxtLink to="/management/admin/">
                  <span>Admin</span>
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
                <NuxtLink to="/management/admin/">
                  <component :is="LayoutDashboard" />
                  <span> Dashbaord </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
            <SidebarMenu>
              <Collapsible as-child default-open class="group/collapsible">
                <SidebarMenuItem>
                  <CollapsibleTrigger as-child>
                    <SidebarMenuButton tooltip="Reports" class="hover:bg-muted">
                      <component :is="ChartNoAxesColumnIncreasing" />
                      <span>Reports</span>
                      <ChevronRight class="ml-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                    </SidebarMenuButton>
                  </CollapsibleTrigger>
                  <CollapsibleContent>
                    <SidebarMenuSub>
                      <SidebarMenuSubItem v-for="activity_log in activity_logs" :key="activity_log.title">
                        <SidebarMenuSubButton as-child class="hover:bg-muted">
                          <NuxtLink :to="activity_log.url">
                            <span>{{ activity_log.title }}</span>
                          </NuxtLink>
                        </SidebarMenuSubButton>
                      </SidebarMenuSubItem>
                    </SidebarMenuSub>
                  </CollapsibleContent>
                </SidebarMenuItem>
              </Collapsible>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="Events" class="hover:bg-muted">
                <NuxtLink to="/management/admin/events">
                  <component :is="Calendar" />
                  <span> Events </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="Posts" class="hover:bg-muted">
                <NuxtLink to="/management/admin/posts">
                  <component :is="Calendar" />
                  <span> Posts </span>
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
