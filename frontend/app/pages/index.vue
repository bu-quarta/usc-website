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

  //officials
  const officials = [
    {
      name: "STACY DANIEL V. ALAMARES",
      position: "Chairperson and Student Regent",
      college: "College of Arts and Letters",
      bu_email: "bu.email@example.com",
    },
    {
      name: "JAMILLE R. BUIZA",
      position: "Internal Vice Chairperson",
      college: "Jesse M. Robreao Institute of Governance and Development",
      bu_email: "bu.email@example.com",
    },
    {
      name: "KC MAXINNE A. MENDONES",
      position: "External Vice Chairperson",
      college: "College of Science",
      bu_email: "bu.email@example.com",
    },
    {
      name: "RANCIA LEI B. BULAWAN",
      position: "Secretary-General",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "BEA LYZZAH B. MADRONIO",
      position: "Deputy Secretary-General",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "YANCY S. BERMAS",
      position: "Finance Officer",
      college: "College of Engineering",
      bu_email: "bu.email@example.com",
    },
    {
      name: "ZHARISSE S. DE LOS SANTOS",
      position: "Deputy Finance Officer",
      college: "College of Engineering",
      bu_email: "bu.email@example.com",
    },
    {
      name: "ARIANNA KESI A. DIGO",
      position: "Auditor",
      college: "College of Business, Economics, and Management",
      bu_email: "bu.email@example.com",
    },
    {
      name: "IZEL B. MANATA",
      position: "Business Manager",
      college: "College of Arts and Letters",
      bu_email: "bu.email@example.com",
    },
    {
      name: "KYLE REUBEN O. BRON",
      position: "Public Information Officer",
      college: "College of Social Sciences and Philosophy",
      bu_email: "bu.email@example.com",
    },
  ]

  //advisers
  const advisers = [
    {
      name: "DR. OFELIA SAMAR-SY",
      position: "Junior Adviser",
      bu_email: "",
      college: "",
    },
    {
      name: "ENGR. HANA MYKA CATON-DULAY",
      position: "Senior Adviser",
      bu_email: "",
      college: "",
    },
    {
      name: "JAZZLYN IMPERIAL",
      position: "Junior Adviser",
      bu_email: "",
      college: "",
    },
  ]

  officials.push(...advisers)

  //cscs
  const cscs: Csc[] = [
    {
      name: "College of Science",
      image_url: "/images/csc/cs",
      abbreviation: "cs",
    },
    {
      name: "College of Nursing",
      image_url: "/images/csc/cn",
      abbreviation: "cn",
    },
    {
      name: "College of Arts and Letters",
      image_url: "/images/csc/cal",
      abbreviation: "cal",
    },
    {
      name: "Jesse M. Robredo Institute Of Governance and Development",
      image_url: "/images/csc/jmrigd",
      abbreviation: "jmrigd",
    },
    {
      name: "College of Business, Economics, and Management",
      image_url: "/images/csc/cbem",
      abbreviation: "cbem",
    },
    {
      name: "Institute of Physical Education Sports and Recreation",
      image_url: "/images/csc/ipesr",
      abbreviation: "ipesr",
    },
    {
      name: "College of Social Sciences and Philosophy",
      image_url: "/images/csc/cssp",
      abbreviation: "cssp",
    },
    {
      name: "College of Education",
      image_url: "/images/csc/ced",
      abbreviation: "ced",
    },
    {
      name: "College Of Engineering",
      image_url: "/images/csc/ce",
      abbreviation: "ce",
    },
    {
      name: "Institute Of Design and Architecture",
      image_url: "/images/csc/ida",
      abbreviation: "ida",
    },
    {
      name: "College of Law",
      image_url: "/images/csc/cl",
      abbreviation: "cl",
    },
    {
      name: "College of Medicine",
      image_url: "/images/csc/cm",
      abbreviation: "cm",
    },
  ]
</script>

<template>
  <section
    class="bg-[radial-gradient(circle,rgba(255,171,0,1)_0%,rgba(0,153,203,1)_100%)] bg-[length:100%_200%] bg-[position:bottom] h-[500px] -mt-60"
  />

  <section id="intro" class="py-8 container px-16 grid grid-cols-2 gap-8">
    <div class="w-full">
      <!-- <AspectRatio :ratio="16 / 9"> </AspectRatio> -->
      <Skeleton class="h-full rounded-md" />
    </div>
    <div class="grid gap-4">
      <div class="leading-tight">
        <p class="font-medium">BICOL UNIVERSITY</p>
        <p class="font-bold text-lg">UNIVERSITY STUDENT COUNCIL</p>
      </div>
      <p class="font-light">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis! Aliquid ea similique dignissimos?
        Praesentium sed in corrupti odit architecto, excepturi pariatur temporibus perspiciatis porro cumque sint? Lorem ipsum dolor sit
        amet consectetur adipisicing elit.
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
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis! Aliquid ea similique dignissimos?
          Praesentium sed in corrupti Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam quisquam perferendis aliquid esse,
          neque consequuntur, natus placeat, provident iure non dolorem odio. Molestiae at similique, autem vel mollitia iure deleniti!
          Pariatur, laudantium. Recusandae, aliquid! Necessitatibus facilis laudantium velit! Facilis sunt animi accusamus harum debitis
          quaerat porro doloribus recusandae molestiae tempore suscipit eos beatae delectus, error dolorem possimus itaque aut nihil!
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
                perferendis aliquid esse, neque consequuntur, natus placeat, provident iure non dolorem odio. Molestiae at similique, autem
                vel mollitia iure deleniti! Pariatur, laudantium. Recusandae, aliquid! Necessitatibus facilis laudantium velit! Facilis sunt
                animi accusamus harum debitis quaerat porro doloribus recusandae molestiae tempore suscipit eos beatae delectus, error
                dolorem possimus itaque aut nihil!
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
        <template v-for="official in officials" :key="official">
          <CarouselItem class="pl-1 md:basis-1/2 lg:basis-1/6">
            <div class="p-1">
              <Card class="border-none">
                <CardContent class="items-center justify-center space-y-2 p-0">
                  <div class="w-full">
                    <Skeleton
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
              <NuxtLink :to="`/cscs/${csc.abbreviation}`">
                <Card class="border-none">
                  <CardContent class="items-center justify-center space-y-2 p-0">
                    <div class="w-full">
                      <div
                        class="flex items-center justify-center rounded-md aspect-[4/5] w-full bg-[linear-gradient(220deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)]"
                      >
                        <!-- <div class="w-3/4">
                        <AspectRatio>
                          <NuxtImg :src="csc.image_url" class="rounded-full" />
                        </AspectRatio>
                      </div> -->

                        <Skeleton class="rounded-full aspect-square w-3/4" />
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
</template>

<style scoped></style>
