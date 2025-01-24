<script setup lang="ts">
  const { data: devs } = useAsyncData<Dev[]>("devs", () => useSanctumFetch("/api/developers"))

  const config = useRuntimeConfig()
</script>

<template>
  <div class="font-light container px-16">
    <section id="intro" class="pb-8 space-y-2">
      <p class="font-bold text-xl">Meet the Developers</p>
      <p class="grid grid-cols-2">
        Behind the University Student Council website is a dedicated team of developers who worked passionately to bring the platform to
        life. With a vision of enhancing communication, transparency, and engagement, they crafted an accessible and user-friendly space for
        students to stay informed, connect with the council, and access important updates seamlessly.
      </p>
    </section>

    <section>
      <div class="p-1 grid grid-cols-3 gap-8 px-44">
        <template v-for="dev in devs" :key="dev">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0 border-none">
              <div class="w-full">
                <div v-if="dev.image_url" class="border rounded-md">
                  <AspectRatio :ratio="4 / 5">
                    <NuxtImg :src="config.public.backendUrl + dev.image_url" class="object-cover w-full h-full rounded-md" />
                  </AspectRatio>
                </div>

                <Skeleton v-else class="rounded-full aspect-square w-3/4" />
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <div>
                  <p class="uppercase font-medium text-sm">{{ dev.name }}</p>
                  <p class="font-light">{{ dev.position }}</p>
                </div>
                <p class="text-[#555555] font-light">{{ dev.college }}</p>
              </div>
            </CardContent>
          </Card>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
