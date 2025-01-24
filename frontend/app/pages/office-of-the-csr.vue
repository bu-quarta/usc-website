<script setup lang="ts">
  const { data } = await useAsyncData<Csr[]>("csrs", () => useSanctumFetch("/api/usc-presidents"))

  const chairpersons = computed(() => data?.value?.filter((csr: Csr) => csr.type === "Chairperson"))
  const chairpersons_student_regents = computed(() => data?.value?.filter((csr: Csr) => csr.type === "Chairperson and Student Regent"))
</script>

<template>
  <div class="font-light">
    <section id="intro" class="container px-16 pb-8 flex gap-4">
      <div class="space-y-4">
        <div class="space-y-2">
          <h1 class="text-xl font-bold">Office of the Chairperson and Student Regent</h1>
          <p class="">
            The University Student Council is the highest student government at Bicol University. It comprises three co-equal branches: the
            Executive Council, the General Legislative Council, and the Judicial Council.
            <br />
            <br />
            The Executive Council, consisting of the elected University Student Council officers, shall be the forerunner of the activities
            and programs stated in Section 3 of Article II of the Council’s Constitution and By-Laws.
          </p>
        </div>

        <div class="space-y-2">
          <p class="font-medium">OUR VISION</p>
          <p>
            A University Student Council that champions student rights and welfare, advocates for accountable leadership, and promotes
            student-centered and responsive service.
          </p>
        </div>
      </div>

      <div class="flex-none w-[20em]">
        <NuxtImg src="/images/usc-logo.png" />
      </div>
    </section>

    <section id="official_directory" class="container px-16 py-8">
      <div class="text-center">
        <p class="text-sm font-normal">BICOL UNIVERSITY</p>
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-bold">CHAIRPERSONS</p>
          <Separator />
        </div>
        <p class="text-xs font-light">1982 - 1997</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="mx-auto my-4 flex flex-wrap w-full justify-center gap-4 px-8">
          <template v-for="csr in chairpersons" :key="csr">
            <Card class="aspect-[3/1] w-[calc(30%_-_4px)] border border-black">
              <CardContent class="space-y-2 py-4 text-center">
                <div>
                  <p class="capitalize text-lg font-semibold">{{ csr.name }}</p>
                  <p class="uppercase">{{ csr.year_range }}</p>
                </div>
                <p>{{ csr.college }}</p>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>

    <section id="_official_directory" class="container px-16 py-8">
      <div class="text-center">
        <p class="text-sm font-normal">BICOL UNIVERSITY</p>
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-bold">CHAIRPERSONS AND STUDENT REGENTS</p>
          <Separator />
        </div>
        <p class="text-xs font-light">1997 - 2025</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="mx-auto my-4 flex flex-wrap w-full justify-center gap-4 px-8">
          <template v-for="csr in chairpersons_student_regents" :key="csr">
            <Card class="aspect-[3/1] w-[calc(30%_-_4px)] border border-black">
              <CardContent class="space-y-2 py-4 text-center">
                <div>
                  <p class="capitalize text-lg font-semibold">{{ csr.name }}</p>
                  <p class="uppercase">{{ csr.year_range }}</p>
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
