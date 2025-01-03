<script setup lang="ts">
  const route = useRoute()
  const routeNameDic: { [key: string]: string } = {
    usc: "The University Student Council",
    faqs: "Frequently Asked Questions",
    "citizens-charter": "Citizens Charter",
    newtab: "New Tab",
  }
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
                <BreadcrumbLink> <NuxtLink to="/">Home</NuxtLink> </BreadcrumbLink>
              </BreadcrumbItem>
              <BreadcrumbSeparator />
              <BreadcrumbItem>
                <BreadcrumbLink>
                  <NuxtLink :to="`/${route.name as string}`"> {{ routeNameDic[route.name as string] }}</NuxtLink>
                </BreadcrumbLink>
              </BreadcrumbItem>
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
