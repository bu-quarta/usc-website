<script setup lang="ts">
  const { data: officials } = await useAsyncData<UscOfficial[]>("usc-officials", () => useSanctumFetch("api/usc-officials"))
  const { data: advisers } = await useAsyncData<UscAdviser[]>("usc-advisers", () => useSanctumFetch("api/usc-advisers"))

  const config = useRuntimeConfig()
</script>

<template>
  <div>
    <section id="about_us" class="container px-16 pb-8 flex gap-4">
      <div class="space-y-4">
        <div class="space-y-2">
          <h1 class="text-xl font-bold">About Us</h1>
          <p class="">
            The University Student Council is the highest student government at Bicol University. It comprises three co-equal branches: the
            Executive Council, the General Legislative Council, and the Judicial Council. The Executive Council, consisting of the elected
            <br />
            <br />
            University Student Council officers, shall be the forerunner of the activities and programs stated in Section 3 of Article II of
            the Council’s Constitution and By-Laws.
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

    <section id="official-directory" class="container px-16 py-8">
      <div class="text-center">
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-medium">OFFICIAL DIRECTORY</p>
          <Separator />
        </div>
        <p class="text-xs font-light">ACADEMIC YEAR 2024-2025</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="p-1 grid grid-cols-4 gap-4 px-8">
          <template v-for="official in officials" :key="official">
            <Card class="border-none">
              <CardContent class="items-center justify-center space-y-2 p-0">
                <div class="w-full">
                  <div v-if="official.image_url" class="border rounded-md">
                    <AspectRatio :ratio="4 / 5">
                      <NuxtImg :src="config.public.backendUrl + official.image_url" class="object-cover w-full h-full rounded-md" />
                    </AspectRatio>
                  </div>

                  <Skeleton v-else class="rounded-full aspect-square w-3/4" />
                </div>
                <div class="text-xs space-y-2 select-none text-center">
                  <div>
                    <p class="uppercase font-medium text-sm">{{ official.name }}</p>
                    <p class="font-light">{{ official.position }}</p>
                  </div>
                  <p class="text-[#555555] font-light">{{ official.college }}</p>
                  <div class="flex gap-1 justify-center">
                    <div>
                      <Icon name="ic:baseline-email" class="mt-0.5" />
                    </div>
                    <p class="text-[#555555] font-light">
                      {{ official.email }}
                    </p>
                  </div>
                </div>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>

    <section id="official_directory_advisers" class="container px-16 py-8">
      <Separator class="mb-16" />

      <div class="p-1 grid grid-cols-4 gap-4 px-8">
        <template v-for="adviser in advisers" :key="adviser">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0">
              <div class="w-full">
                <div v-if="adviser.image_url" class="border rounded-md">
                  <AspectRatio :ratio="4 / 5">
                    <NuxtImg :src="config.public.backendUrl + adviser.image_url" class="object-cover w-full h-full rounded-md" />
                  </AspectRatio>
                </div>

                <Skeleton v-else class="rounded-full aspect-square w-3/4" />
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <div>
                  <p class="uppercase font-medium text-sm">{{ adviser.name }}</p>
                  <p class="font-light">{{ adviser.position }}</p>
                  <p class="font-light">{{ adviser.type }}</p>
                </div>
              </div>
            </CardContent>
          </Card>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
