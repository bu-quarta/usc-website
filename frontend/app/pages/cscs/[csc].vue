<script setup lang="ts">
  // last route name
</script>

<template>
  <div class="font-light">
    <section id="intro" class="pb-8 container space-y-2 px-16">
      <p class="font-bold text-xl uppercase">{{ `BU${useRoute().params.csc} CSC` }}</p>
      <p class="font-medium">Bicol University College of Science College Student Council</p>
      <p class="grid grid-cols-2">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non pretium
        velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia libero.
        Vestibulum in nisi leo.
      </p>
    </section>

    <section id="official_directory" class="container px-16 py-8">
      <div class="text-center">
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-medium">OFFICIAL DIRECTORY</p>
          <Separator />
        </div>
        <p class="text-xs font-light">ACADEMIC YEAR 2024-2025</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="mx-auto my-4 flex flex-wrap w-full justify-center gap-4 px-8">
          <template v-for="i in 11" :key="i">
            <Card class="aspect-[3/1] w-[calc(30%_-_4px)] border border-black">
              <CardContent class="space-y-2 py-4">
                <div>
                  <p class="capitalize text-lg font-medium">juan dela cruz</p>
                  <p>Chairperson</p>
                </div>
                <p>officer.email@example.com</p>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
