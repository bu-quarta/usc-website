<script setup lang="ts">
  const csrs: Csr[] = [
    {
      name: "Stacy Daniel V. Alamares",
      school_year: "2024-2025",
      college: "College of Arts and Letters",
    },
    {
      name: "Remee Estefany P. Baldorado",
      school_year: "2023-2024",
      college: "College of Social Sciences and Philosophy",
    },
    {
      name: "Asher Jade T. Azul",
      school_year: "2022-2023",
      college: "College of Engineering",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
    {
      name: "Name",
      school_year: "20xx-20XX",
      college: "College",
    },
  ]
</script>

<template>
  <div class="font-light">
    <section id="intro" class="container px-16 pb-8 flex gap-4">
      <div class="space-y-4">
        <div class="space-y-2">
          <h1 class="text-xl font-bold">Office of the Chairperson and Student Regent</h1>
          <p class="">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
            pretium velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia
            libero. Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra, lacus augue egestas nibh, non efficitur ligula
            nulla at lectus.
          </p>
          <p>
            Suspendisse pharetra scelerisque leo at luctus. Morbi molestie scelerisque velit vitae rutrum. Cras vitae fermentum ipsum. Ut eu
            velit urna. Mauris congue dui quis tellus iaculis, quis molestie tellus lobortis. Pellentesque mollis libero nec ullamcorper
            laoreet. Suspendisse fringilla rutrum diam in facilisis. Nunc dictum pellentesque diam. Cras magna purus, suscipit at molestie
            at, laoreet sit amet mi. Nunc porttitor rutrum sapien lacinia efficitur. Nullam ac dui nec dolor pellentesque euismod. Nullam
            finibus tristique nibh nec volutpat.
          </p>
        </div>

        <div class="space-y-2">
          <p class="font-medium">OUR VISION</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
            pretium velit. Etiam in lobortis mauris.
          </p>
        </div>
      </div>

      <div class="aspect-square w-[1500px] flex items-center justify-center">
        <NuxtImg src="/images/usc-logo.jpg" class="w-full" />
      </div>
    </section>

    <section id="official_directory" class="container px-16 py-8">
      <div class="text-center">
        <p class="text-sm font-normal">BICOL UNIVERSITY</p>
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-bold">CHAIRPERSONS AND STUDENT REGENTS</p>
          <Separator />
        </div>
        <p class="text-xs font-light">19XX - PRESENT</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="mx-auto my-4 flex flex-wrap w-full justify-center gap-4 px-8">
          <template v-for="csr in csrs" :key="csr">
            <Card class="aspect-[3/1] w-[calc(30%_-_4px)] border border-black">
              <CardContent class="space-y-2 py-4 text-center">
                <div>
                  <p class="capitalize text-lg font-semibold">{{ csr.name }}</p>
                  <p class="uppercase">{{ csr.school_year }}</p>
                </div>
                <p>{{ csr.college }}</p>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
