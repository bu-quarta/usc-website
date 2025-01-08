<script setup lang="ts">
  const route = useRoute()
  const routeNameDic: { [key: string]: string } = {
    usc: "The University Student Council",
    faqs: "Frequently Asked Questions",
    "citizens-charter": "Citizens Charter",
    cscs: "College of Student Councils",
    "office-of-the-csr": "Office of the Chairperson and Student Regent",
    devs: "The Developers",
    events: "events",
    "news-and-updates": "News and Updates",
    reports: "Reports",
    "document-tracking": "Track My Document",
    cs: "BUCS CSC",
    cn: "BUCN CSC",
    cal: "BUCAL CSC",
    jmrigd: "BUCJMRIGD CSC",
    cbem: "BUCBEM CSC",
    ipesr: "BUCIPESR CSC",
    cssp: "BUCSSP CSC",
    ced: "BUCED CSC",
    ce: "BUCE CSC",
    ida: "BUCIDA CSC",
    cl: "BUCL CSC",
    cm: "BUCM CSC",
  }

  const _routes = computed(() => {
    const paths = route.path.split("/").filter((x) => x !== "")
    return paths.map((name, index) => {
      return { name, path: `/${paths.slice(0, index + 1).join("/")}` }
    })
  })
</script>

<template>
  <div>
    <div>
      <div class="z-20 relative bg-background">
        <Header />
      </div>
      <div v-if="route.name !== 'index'">
        <section class="bg-[linear-gradient(260deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)] h-24" />
        <section id="breadcrumb" class="py-4 container px-16">
          <Breadcrumb>
            <BreadcrumbList>
              <BreadcrumbItem>
                <BreadcrumbLink> <NuxtLink to="/">HOME</NuxtLink> </BreadcrumbLink>
              </BreadcrumbItem>
              <template v-for="_route in _routes" :key="_route">
                <BreadcrumbSeparator />
                <BreadcrumbItem>
                  <BreadcrumbLink>
                    <NuxtLink :to="`${_route.path}`" class="uppercase"> {{ routeNameDic[_route.name] }}</NuxtLink>
                  </BreadcrumbLink>
                </BreadcrumbItem>
              </template>
            </BreadcrumbList>
          </Breadcrumb>
        </section>
      </div>
      <div class="-z-20 text-sm">
        <slot />
      </div>
      <Footer />
    </div>

    <Login />
    <LoginRequired />
  </div>
</template>

<style scoped></style>
