<script setup lang="ts">
  import { Calendar, ChartNoAxesColumnIncreasing, ChevronRight, LayoutDashboard, LogOut, Newspaper, RouteIcon } from "lucide-vue-next"
  import Test from "~/assets/icons/test.svg"

  const reports = [
    {
      title: "Financial Reports",
      url: "/usc-management/usc-pio/financial-reports",
    },
    {
      title: "Audit Report",
      url: "/usc-management/usc-pio/audit-reports",
    },
    {
      title: "Accomplishment Records",
      url: "/usc-management/usc-pio/accomplishment-records",
    },
    {
      title: "GLC Resolutions",
      url: "/usc-management/usc-pio/glc-resolutions",
    },
    {
      title: "Other Documents",
      url: "/usc-management/usc-pio/other-documents",
    },
  ]

  const route = useRoute()

  //last part of the route
  const lastRoute = route.path.split("/").pop()

  // map route
  const routeDic: { [key: string]: string } = {
    "news-and-updates": "News and Update",
    events: "Events",
    "financial-reports": "Financial Reports",
    "audit-reports": "Audit Report",
    "accomplishment-records": "Accomplishment Records",
    "glc-resolutions": "GLC Resolutions",
    "other-documents": "Other Documents",
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
                  <span>USC P.I.O</span>
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
                <NuxtLink to="/usc-management/usc-pio/">
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
                      <SidebarMenuSubItem v-for="report in reports" :key="report.title">
                        <SidebarMenuSubButton as-child class="hover:bg-muted">
                          <NuxtLink :to="report.url">
                            <span>{{ report.title }}</span>
                          </NuxtLink>
                        </SidebarMenuSubButton>
                      </SidebarMenuSubItem>
                    </SidebarMenuSub>
                  </CollapsibleContent>
                </SidebarMenuItem>
              </Collapsible>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="News and Update" class="hover:bg-muted">
                <NuxtLink to="/usc-management/usc-pio/news-and-update">
                  <component :is="Newspaper" />
                  <span> News and Update </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="Events" class="hover:bg-muted">
                <NuxtLink to="/usc-management/usc-pio/events">
                  <component :is="Calendar" />
                  <span> Events </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
          </SidebarGroup>
        </SidebarContent>
        <SidebarFooter>
          <SidebarMenu>
            <SidebarMenuButton as-child tooltip="Logout" class="hover:bg-muted">
              <NuxtLink to="/usc-management/profile">
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
