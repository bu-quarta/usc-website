<script setup lang="ts">
  import { Search } from "lucide-vue-next"
</script>

<template>
  <div class="container px-16">
    <section id="track_my_document" class="pb-8 flex gap-4">
      <div class="space-y-4">
        <h1 class="text-xl font-bold">Track My Document</h1>
      </div>
    </section>

    <div class="w-full max-w-[40rem] mx-auto">
      <div class="relative w-full items-center">
        <Input id="search" type="text" placeholder="Search..." class="pr-10" />
        <span class="absolute end-0 inset-y-0 flex items-center justify-center px-3 bg-[#0099CB] rounded-sm cursor-pointer">
          <Search class="size-4 text-primary-foreground" />
        </span>
      </div>

      <Card class="mt-4">
        <CardContent class="py-4">
          <div class="flex py-4 gap-4">
            <div class="size-12 bg-muted-foreground/30 flex items-center justify-center rounded-full">
              <Icon name="hugeicons:google-doc" class="text-muted-foreground" size="30" />
            </div>
            <div>
              <h5 class="font-semibold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci asperiores</h5>
              <h5>BUCS College Student Council</h5>
              <h5 class="text-[#2C2AC8] mt-2"><span class="text-muted-foreground">Code:</span> DOC-000-XXXX</h5>
            </div>
          </div>

          <Separator class="mt-4 mb-8" />

          <DocumentStepper />
        </CardContent>
      </Card>
    </div>
  </div>
</template>

<style scoped></style>
