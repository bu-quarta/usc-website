<script setup lang="ts">
  import { Calendar, ChartNoAxesColumnIncreasing, ChevronRight, LayoutDashboard, LogOut, Newspaper } from "lucide-vue-next"
  import Test from "~/assets/icons/test.svg"
  import Toaster from "@/components/ui/toast/Toaster.vue"

  const reports = [
    {
      title: "Financial Reports",
      url: "/management/pio/financial-reports",
    },
    {
      title: "Audit Report",
      url: "/management/pio/audit-reports",
    },
    {
      title: "Accomplishment Records",
      url: "/management/pio/accomplishment-records",
    },
    {
      title: "GLC Resolutions",
      url: "/management/pio/glc-resolutions",
    },
    {
      title: "Other Documents",
      url: "/management/pio/other-documents",
    },
  ]

  const route = useRoute()
  const lastRoute = computed(() => route.path.split("/").pop())

  const routeDic: { [key: string]: string } = {
    "news-and-updates": "News and Updates",
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
    <Toaster />
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
                <NuxtLink to="/management/pio/">
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
                <NuxtLink to="/management/pio/news-and-updates">
                  <component :is="Newspaper" />
                  <span> News and Update </span>
                </NuxtLink>
              </SidebarMenuButton>
            </SidebarMenu>
            <SidebarMenu>
              <SidebarMenuButton as-child tooltip="Events" class="hover:bg-muted">
                <NuxtLink to="/management/pio/events">
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
              <NuxtLink to="/management/">
                <component :is="LogOut" class="rotate-180" />
                <span>Logout</span>
              </NuxtLink>
            </SidebarMenuButton>
          </SidebarMenu>
        </SidebarFooter>
        <SidebarRail />
      </Sidebar>
      <SidebarInset class="h-screen">
        <header
          class="flex h-16 shrink-0 items-center gap-2 transition-[width,height] ease-linear group-has-[[data-collapsible=icon]]/sidebar-wrapper:h-12"
        >
          <div class="flex items-center gap-2 -ml-4">
            <SidebarTrigger class="-ml-1" />
            <Separator orientation="vertical" class="mr-2 h-4" />
            <h5 class="text-muted-foreground font-medium">{{ routeDic[lastRoute as string] ?? "Dashboard" }}</h5>
          </div>
        </header>
        <div class="overflow-y-auto scrollbar-hide" style="height: calc(100vh - 4rem)">
          <slot />
        </div>
      </SidebarInset>
    </SidebarProvider>
  </div>
</template>

<style scoped>
  .scrollbar-hide {
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* Internet Explorer and Edge */
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none; /* Chrome, Safari, and Opera */
  }
</style>
