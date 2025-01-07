<script setup lang="ts"></script>

<template>
  <div>
    <section id="events" class="container px-16 pb-8">
      <div class="flex justify-between">
        <h1 class="text-xl font-bold">USC Events</h1>
        <div class="relative max-w-sm items-center">
          <Input id="search" type="text" placeholder="Search Events" class="pl-10" />
          <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <Icon name="lucide:search" class="size-5 text-muted-foreground" />
          </span>
        </div>
      </div>

      <div class="grid grid-cols-4 mt-8 gap-4">
        <div class="col-span-2">
          <Card class="h-full border-none">
            <CardContent class="h-full flex flex-col p-0">
              <Skeleton class="flex-1" />

              <div class="space-y-4 text-xs pb-5">
                <div class="space-y-2 mt-4">
                  <Label class="font-medium uppercase text-xs text-[#FFA200]">Ongoing</Label>
                  <p class="text-lg font-semibold leading-5 truncate">Praesentium sed in corrupti lorem odit architecto</p>
                  <p>SEPTEMBER 15, 2024</p>
                </div>
                <div class="flex items-start gap-1">
                  <Icon name="mdi:location" class="size-4" />
                  <p>Bicol University Main Campus</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </div>
        <template v-for="i in 2">
          <EventCard />
        </template>
      </div>
    </section>

    <section id="" class="container px-16 py-8">
      <div class="flex items-center gap-2 pb-8">
        <p class="text-xl font-bold">Past Events</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid grid-cols-4 mt-8 gap-4">
        <template v-for="i in 4" :key="i">
          <EventCard pastEvents />
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
