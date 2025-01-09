<script setup lang="ts">
  import { Calendar, ChartNoAxesColumnIncreasing, ChevronRight, LayoutDashboard, LogOut, Newspaper } from "lucide-vue-next"
  import Test from "~/assets/icons/test.svg"
  const reports = [
    {
      title: "Financial Reports",
      url: "/usc-management/usc-pio/financial-reports",
    },
    {
      title: "Audit Report",
      url: "/usc-management/usc-pio/audit-report",
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
</script>

<template>
  <SidebarProvider class="select-none">
    <Sidebar collapsible="icon">
      <SidebarHeader class="">
        <SidebarMenu>
          <SidebarMenuItem>
            <SidebarMenuButton>
              <!-- <component :is="Test" /> -->
              <span>USC Management</span>
            </SidebarMenuButton>
          </SidebarMenuItem>
        </SidebarMenu>
      </SidebarHeader>
      <SidebarContent>
        <SidebarGroup>
          <SidebarGroupLabel class="hidden" />
          <SidebarMenu>
            <SidebarMenuButton as-child tooltip="Dashboard">
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
          <SidebarMenu class="data-[active=true]:bg-primary">
            <SidebarMenuButton as-child tooltip="News and Update" class="hover:bg-muted">
              <NuxtLink to="/usc-management/usc-pio/news-and-update">
                <component :is="Newspaper" />
                <span> News and Update </span>
              </NuxtLink>
            </SidebarMenuButton>
          </SidebarMenu>
          <SidebarMenu class="data-[active=true]:bg-primary">
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
        <SidebarMenu class="data-[active=true]:bg-primary">
          <SidebarMenuButton as-child tooltip="Logout">
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
        <div class="flex items-center gap-2 px-4">
          <SidebarTrigger class="-ml-1" />
          <Separator orientation="vertical" class="mr-2 h-4" />
        </div>
      </header>
      <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
          <div class="aspect-video rounded-xl bg-muted/50" />
          <div class="aspect-video rounded-xl bg-muted/50" />
          <div class="aspect-video rounded-xl bg-muted/50" />
        </div>
        <div class="min-h-[100vh] flex-1 rounded-xl bg-muted/50 md:min-h-min" />
      </div>
    </SidebarInset>
  </SidebarProvider>
</template>

<style scoped></style>
