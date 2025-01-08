<script setup lang="ts"></script>

<template>
  <div>
    <section id="events" class="container px-16 pb-8">
      <div class="flex justify-between">
        <h1 class="text-xl font-bold">News and Updates</h1>
        <div class="relative max-w-sm items-center">
          <Input id="search" type="text" placeholder="Search Events" class="pl-10" />
          <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <Icon name="lucide:search" class="size-5 text-muted-foreground" />
          </span>
        </div>
      </div>

      <Card class="border-none mt-8">
        <CardContent class="grid grid-cols-6 gap-4">
          <NewsAndUpdateCard class="col-span-3" aspect="3/2" clamp="2" />
          <NewsAndUpdateCard class="col-span-3" aspect="3/2" clamp="2" />

          <template v-for="i in 3" :key="i">
            <NewsAndUpdateCard class="col-span-2" />
          </template>
        </CardContent>
      </Card>
    </section>

    <section id="" class="container px-16 pb-4">
      <div class="flex items-center gap-8">
        <p class="text-xl font-bold">Read More</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid lg:grid-cols-4 grid-cols-3 gridcol mt-8 gap-4">
        <template v-for="i in 6" :key="i">
          <NewsAndUpdateCard />
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
