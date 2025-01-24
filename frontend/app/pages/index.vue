<script setup lang="ts">
  import Autoplay from "embla-carousel-autoplay"

  //autoplay official directory
  const plugin = Autoplay({
    delay: 2000,
    stopOnMouseEnter: true,
    stopOnInteraction: false,
  })

  //autoplay cscs
  const plugin2 = Autoplay({
    delay: 2000,
    stopOnMouseEnter: true,
    stopOnInteraction: false,
  })

  interface Home {
    uscs: UscOfficial[]
    usc_advisers: UscAdviser[]
    cscs: CscDirectory[]
  }

  const config = useRuntimeConfig()
  const { data } = await useAsyncData<Home>("home", () => useSanctumFetch(`${config.public.backendUrl}/api/home`))

  const uscOfficials = data.value?.uscs as UscOfficial[]
  const uscAdvisers = data.value?.usc_advisers as UscAdviser[]
  const cscs = data.value?.cscs as CscDirectory[]
</script>

<template>
  <div>
    <section
      class="bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)] bg-[length:100%_200%] bg-[position:bottom] h-[500px] -mt-60"
    />

    <section id="intro" class="py-8 container px-16 grid grid-cols-2 gap-8">
      <div class="w-full">
        <AspectRatio :ratio="16 / 9">
          <NuxtImg src="/images/log-usc-website.png" class="rounded-md h-full w-full object-cover" placeholder />
        </AspectRatio>
      </div>
      <div class="grid">
        <div class="leading-tight">
          <p class="font-medium">BICOL UNIVERSITY</p>
          <p class="font-bold text-lg">UNIVERSITY STUDENT COUNCIL</p>
        </div>
        <p class="font-light">
          The University Student Council is the highest student government at Bicol University. It comprises three co-equal branches: the
          Executive Council, the General Legislative Council, and the Judicial Council. The Executive Council, consisting of the elected
          <br />
          <br />
          University Student Council officers, shall be the forerunner of the activities and programs stated in Section 3 of Article II of
          the Council’s Constitution and By-Laws.
        </p>
        <div>
          <p class="font-medium">OUR VISION</p>
          <p class="font-light">
            A University Student Council that champions student rights and welfare, advocates for accountable leadership, and promotes
            student-centered and responsive service.
          </p>
        </div>
        <div>
          <NuxtLink to="/usc">
            <Button size="sm">Read More<Icon name="material-symbols:chevron-right-rounded" size="20" /></Button>
          </NuxtLink>
        </div>
      </div>
    </section>

    <section id="latest_updates" class="py-8 container px-16">
      <div class="flex justify-between">
        <p class="font-bold text-lg">Latest Updates</p>
        <NuxtLink to="/news-and-updates">
          <Button variant="link" size="sm" class="hover:no-underline italic">
            See More
            <Icon name="material-symbols-light:chevron-right" size="20" />
          </Button>
        </NuxtLink>
      </div>

      <div class="grid grid-cols-2 gap-8 mt-4">
        <div class="flex flex-col gap-4">
          <div class="grow">
            <!-- <AspectRatio :ratio="7 / 4"> </AspectRatio> -->
            <Skeleton class="rounded-md h-full" />
          </div>
          <div>
            <p class="font-medium text-base">Praesentium sed in corrupti odit architecto</p>
            <p class="text-xs uppercase">January 1, 2025</p>
          </div>
          <p class="line-clamp-2 after:content-['...']">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis! Aliquid ea similique
            dignissimos? Praesentium sed in corrupti Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam quisquam perferendis
            aliquid esse, neque consequuntur, natus placeat, provident iure non dolorem odio. Molestiae at similique, autem vel mollitia
            iure deleniti! Pariatur, laudantium. Recusandae, aliquid! Necessitatibus facilis laudantium velit! Facilis sunt animi accusamus
            harum debitis quaerat porro doloribus recusandae molestiae tempore suscipit eos beatae delectus, error dolorem possimus itaque
            aut nihil!
          </p>
        </div>

        <div class="flex flex-col gap-4 text-xs">
          <template v-for="i in 4" :key="i">
            <div class="grid grid-cols-4 gap-4">
              <div class="">
                <!-- <AspectRatio :ratio="4/3"> </AspectRatio> -->
                <Skeleton class="rounded-md aspect-[4/3]" />
              </div>
              <div class="flex flex-col gap-2 col-span-3">
                <div>
                  <p class="font-medium text-sm">Praesentium sed in corrupti odit architecto</p>
                  <p class="text-xs uppercase">January 1, 2025</p>
                </div>

                <p class="line-clamp-3 after:content-['...']">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis! Aliquid ea similique
                  dignissimos? Praesentium sed in corrupti Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam quisquam
                  perferendis aliquid esse, neque consequuntur, natus placeat, provident iure non dolorem odio. Molestiae at similique,
                  autem vel mollitia iure deleniti! Pariatur, laudantium. Recusandae, aliquid! Necessitatibus facilis laudantium velit!
                  Facilis sunt animi accusamus harum debitis quaerat porro doloribus recusandae molestiae tempore suscipit eos beatae
                  delectus, error dolorem possimus itaque aut nihil!
                </p>
              </div>
            </div></template
          >
        </div>
      </div>
    </section>

    <section id="usc_events" class="py-8 container px-16">
      <div class="flex justify-between">
        <p class="font-bold text-lg">USC Events</p>
        <NuxtLink to="/events">
          <Button variant="link" size="sm" class="hover:no-underline italic">
            See More
            <Icon name="material-symbols-light:chevron-right" size="20" />
          </Button>
        </NuxtLink>
      </div>

      <div class="grid grid-cols-6 gap-4 mt-4">
        <div class="space-y-2 text-xs">
          <div>
            <!-- <AspectRatio :ratio="16 / 9"> </AspectRatio> -->
            <Skeleton class="rounded-md aspect-[4/5]" />
          </div>
          <p class="text-[#EA3333] uppercase">UPCOMING EVENT</p>
          <p class="font-medium text-sm">Praesentium sed in corrupti odit architecto</p>
          <p class="uppercase">JANUary 1, 2025</p>
          <p class="gap-1"><Icon name="cil:location-pin" /> <span>Venue</span></p>
        </div>

        <div class="space-y-2 text-xs">
          <div>
            <!-- <AspectRatio :ratio="16 / 9"> </AspectRatio> -->
            <Skeleton class="rounded-md aspect-[4/5]" />
          </div>
          <p class="text-[#EAA733] uppercase">ONGOING EVENT</p>
          <p class="font-medium text-sm">Praesentium sed in corrupti odit architecto</p>
          <p class="uppercase">JANUary 1, 2025</p>
          <p class="gap-1"><Icon name="cil:location-pin" /> <span>Venue</span></p>
        </div>

        <template v-for="i in 4" :key="i">
          <div class="space-y-2 text-xs">
            <div>
              <!-- <AspectRatio :ratio="16 / 9"> </AspectRatio> -->
              <Skeleton class="rounded-md aspect-[4/5]" />
            </div>
            <p class="font-medium text-sm">Praesentium sed in corrupti odit architecto</p>
            <p class="uppercase">JANUary 1, 2025</p>
            <p class="gap-1"><Icon name="cil:location-pin" /> <span>Venue</span></p>
          </div>
        </template>
      </div>
    </section>

    <section id="official_directory" class="py-8 container px-16">
      <div class="text-xs text-center space-y-1">
        <p class="font-bold text-sm">OFFICIAL DIRECTORY</p>
        <p class="font-medium">Bicol University - University Student Council</p>
        <p class="uppercase">ACADEMIC YEAR 2024-2025</p>
      </div>

      <Separator class="my-4" />

      <Carousel
        class="relative w-full"
        :opts="{
          align: 'start',
        }"
        :plugins="[plugin]"
        @mouseenter="plugin.stop"
        @mouseleave=";[plugin.reset(), plugin.play()]"
      >
        <CarouselContent class="-ml-1">
          <template v-for="official in uscOfficials" :key="official">
            <CarouselItem class="pl-1 md:basis-1/2 lg:basis-1/6">
              <div class="p-1">
                <Card class="border-none">
                  <CardContent class="items-center justify-center space-y-2 p-0">
                    <div class="w-full">
                      <AspectRatio v-if="official.image_url" :ratio="4 / 5">
                        <NuxtImg :src="config.public.backendUrl + official.image_url" class="rounded-md w-full h-full object-cover" />
                      </AspectRatio>

                      <Skeleton
                        v-else
                        class="rounded-md aspect-[4/5] w-full bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)]"
                      />
                    </div>
                    <div class="text-xs space-y-2 select-none text-center">
                      <div>
                        <p class="uppercase font-medium text-sm">{{ official.name }}</p>
                        <p class="font-light">{{ official.position }}</p>
                      </div>
                      <p class="text-[#555555] font-light">{{ official.college }}</p>
                    </div>
                  </CardContent>
                </Card>
              </div>
            </CarouselItem>
          </template>

          <template v-for="uscAdviser in uscAdvisers" :key="uscAdviser">
            <CarouselItem class="pl-1 md:basis-1/2 lg:basis-1/6">
              <div class="p-1">
                <Card class="border-none">
                  <CardContent class="items-center justify-center space-y-2 p-0">
                    <div class="w-full">
                      <AspectRatio v-if="uscAdviser.image_url" :ratio="4 / 5">
                        <NuxtImg :src="config.public.backendUrl + uscAdviser.image_url" class="rounded-md w-full h-full object-cover" />
                      </AspectRatio>

                      <Skeleton
                        v-else
                        class="rounded-md aspect-[4/5] w-full bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)]"
                      />
                    </div>
                    <div class="text-xs space-y-2 select-none text-center">
                      <div>
                        <p class="uppercase font-medium text-sm">{{ uscAdviser.name }}</p>
                        <p class="font-light">{{ uscAdviser.position }}</p>
                      </div>
                      <p class="text-[#555555] font-light">{{ uscAdviser.type }}</p>
                    </div>
                  </CardContent>
                </Card>
              </div>
            </CarouselItem>
          </template>
        </CarouselContent>
      </Carousel>
    </section>

    <section id="cscs" class="py-8 container px-16">
      <div class="flex justify-between">
        <p class="font-bold text-lg">College Student Councils</p>
        <NuxtLink to="/cscs">
          <Button variant="link" size="sm" class="hover:no-underline italic">
            View All
            <Icon name="material-symbols-light:chevron-right" size="20" />
          </Button>
        </NuxtLink>
      </div>

      <Carousel
        class="relative w-full mt-4"
        :opts="{
          align: 'start',
        }"
        :plugins="[plugin2]"
        @mouseenter="plugin2.stop"
        @mouseleave=";[plugin2.reset(), plugin2.play()]"
      >
        <CarouselContent class="-ml-1">
          <template v-for="csc in cscs" :key="csc">
            <CarouselItem class="pl-1 md:basis-1/2 lg:basis-1/6">
              <div class="p-1">
                <NuxtLink :to="`/cscs/${csc.slug}`">
                  <Card class="border-none">
                    <CardContent class="items-center justify-center space-y-2 p-0">
                      <div class="w-full">
                        <div
                          class="flex items-center justify-center rounded-md aspect-[4/5] w-full bg-[linear-gradient(220deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)]"
                        >
                          <div v-if="csc.image_url" class="w-3/4">
                            <AspectRatio>
                              <NuxtImg :src="config.public.backendUrl + csc.image_url" />
                            </AspectRatio>
                          </div>

                          <Skeleton v-else class="rounded-full aspect-square w-3/4" />
                        </div>
                      </div>
                      <div class="text-xs space-y-2 select-none text-center">
                        <p class="font-medium text-sm">{{ csc.name }}</p>
                      </div>
                    </CardContent>
                  </Card>
                </NuxtLink>
              </div>
            </CarouselItem>
          </template>
        </CarouselContent>
      </Carousel>
    </section>
  </div>
</template>

<style scoped></style>
