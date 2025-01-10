<script setup lang="ts">
  const text = `Lorem ipsum odor amet, consectetuer adipiscing elit. Habitant netus bibendum et nullam, consectetur duis aliquet blandit.
Phasellus nullam hendrerit etiam conubia torquent natoque. Quisque sodales nam, imperdiet primis amet leo velit. Ex ipsum sit
ullamcorper nunc morbi curabitur id quam. Dis eu sapien justo ante posuere neque elit tristique. Auctor viverra mi justo at eget.
Nec vel posuere class tortor eget arcu morbi enim. 

Nunc nunc aptent class suspendisse dictum sem viverra nisi. Tortor lobortis
fusce conubia finibus feugiat est consequat augue. Ligula eros quisque vitae volutpat justo natoque quisque. Class torquent neque
netus tempus taciti mus. Nulla aenean montes; ridiculus ultricies sociosqu dictum. Convallis viverra facilisis lobortis fames
lacinia. Sed pulvinar tempor ullamcorper, adipiscing vivamus mi etiam.`

  interface Comment {
    iamge_url: string
    name?: string | null
    rating: number
    comment: string
    likes: number
    dislikes: number
    created_at: string
  }

  const sortComment = ref()
  const currentRating = ref(0)
  const commentRating = ref(4)

  const setRating = (rating: number): void => {
    currentRating.value = rating
  }

  const comments = ref<Comment[]>([
    {
      iamge_url: "",
      name: "Dr. Baby Boy",
      rating: 4,
      comment:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum expedita laborum, pariatur ipsum vitae voluptatem alias esse quo. Veritatis explicabo modi, consequuntur porro voluptatum optio ratione obcaecati fugit repellendus accusantium?",
      likes: 1200,
      dislikes: 203,
      created_at: "1hr",
    },
    {
      iamge_url: "",
      name: "Juan Dela Cruz",
      rating: 0,
      comment:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum expedita laborum, pariatur ipsum vitae voluptatem alias esse quo. Veritatis explicabo modi, consequuntur porro voluptatum optio ratione obcaecati fugit repellendus accusantium?",
      likes: 100,
      dislikes: 2103,
      created_at: "1hr",
    },
    {
      iamge_url: "",
      rating: 0,
      comment:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum expedita laborum, pariatur ipsum vitae voluptatem alias esse quo. Veritatis explicabo modi, consequuntur porro voluptatum optio ratione obcaecati fugit repellendus accusantium?",
      likes: 1200,
      dislikes: 203,
      created_at: "Sept 21, 2023",
    },
    {
      iamge_url: "",
      name: "Juan Dela Cruz",
      rating: 1,
      comment:
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum expedita laborum, pariatur ipsum vitae voluptatem alias esse quo. Veritatis explicabo modi, consequuntur porro voluptatum optio ratione obcaecati fugit repellendus accusantium?",
      likes: 1200,
      dislikes: 203,
      created_at: "Oct 27, 2023",
    },
  ])
</script>

<template>
  <div class="container px-32">
    <Card class="py-8 border-none">
      <CardContent>
        <Skeleton class="h-96 w-full" />
        <div class="flex justify-between items-center p-4">
          <CardHeader class="p-0">
            <CardTitle>Lorem ipsum dolor sit amet consectetur adipisicing elit</CardTitle>
            <CardDescription>
              <div class="flex gap-8">
                <p class="text-foreground">SEPTEMBER 15, 2024</p>
                <p class="flex items-center gap-1">
                  <Icon name="mdi:location" />
                  <span>Bicol University Main Campus</span>
                </p>
              </div>
            </CardDescription>
          </CardHeader>
          <Button size="sm">
            <p>Evaluate</p>
            <Icon name="lucide:pencil" />
          </Button>
        </div>

        <p class="whitespace-pre-wrap p-4">{{ text }}</p>

        <div class="space-y-2">
          <p>Share this on</p>
          <div class="flex gap-1 items-center">
            <Button size="sm" class="bg-[#1877F2] hover:bg-[#195eff]">
              <SocialShare network="facebook" />
            </Button>
            <Button size="sm" class="bg-[#000000] hover:bg-foreground">
              <SocialShare network="x" />
            </Button>
            <Button size="sm">
              <Icon name="lucide:link-2" class="-rotate-45" />
            </Button>
          </div>
        </div>

        <div class="flex justify-between py-4">
          <NuxtLink to="">
            <Card class="border-[#0099CB]">
              <CardContent class="py-2 flex justify-between items-center w-44">
                <Icon name="mingcute:arrow-left-line" />
                <div class="font-semibold text-right">
                  <p class="text-gray-500">Previous</p>
                  <p class="text-[#0099CB]">Event Name</p>
                </div>
              </CardContent>
            </Card>
          </NuxtLink>

          <NuxtLink to="">
            <Card class="bg-[#0099CB] border-[#0099CB]">
              <CardContent class="py-2 flex justify-between items-center w-44">
                <div class="font-semibold">
                  <p class="text-[#FFFFFFBF]">Next</p>
                  <p class="text-secondary">Event Name</p>
                </div>
                <Icon name="mingcute:arrow-right-line" class="text-[#FFFFFFBF]" />
              </CardContent>
            </Card>
          </NuxtLink>
        </div>
      </CardContent>
    </Card>

    <section id="rating" class="space-y-2">
      <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
        <Separator />
        <p class="text-base font-bold">Rate this Event!</p>
        <Separator />
      </div>
      <div class="flex items-center justify-center gap-2 py-4">
        <template v-for="i in 5" :key="i">
          <svg
            @click="setRating(i)"
            class="w-10 h-10 me-1 cursor-pointer"
            :class="i <= currentRating ? 'text-[#FFA200] fill-current' : 'fill-neutral-400'"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 22 20"
          >
            <path
              d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
            />
          </svg>
        </template>
      </div>

      <div class="flex items-start space-x-2 py-4 px-16">
        <Checkbox id="terms" />
        <label for="terms" class="text-sm font-light leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non pretium
          velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia libero.
          Vestibulum in nisi leo. Integer tincidunt, turpis id maximus viverra , lacus augue egestas nibh, non efficitur ligula nulla at
          lectus.
        </label>
      </div>

      <div class="text-center">
        <Button size="sm" class="bg-[#0099CB] hover:bg-[#008ebe] uppercase">
          Submit Rating
          <Icon name="prime:send" size="18" />
        </Button>
      </div>
    </section>

    <Card id="comment" class="py-8 border-none">
      <CardContent class="space-y-2">
        <div class="grid w-full gap-2">
          <Label for="message">Comments</Label>
          <Textarea id="message" placeholder="Write a comment" />
        </div>
        <div class="flex gap-2 justify-end">
          <div class="flex items-center space-x-2">
            <Label for="comment-anonymously">Comment Anonymously</Label>
            <Switch id="comment-anonymously" />
          </div>
          <Button size="sm" class="bg-[#0099CB] hover:bg-[#008ebe] uppercase">
            Comment
            <Icon name="prime:send" size="18" />
          </Button>
        </div>
      </CardContent>
    </Card>

    <Card id="comments" class="py-8 border-none">
      <CardContent>
        <Select v-model:model-value="sortComment">
          <SelectTrigger class="w-[140px]">
            <SelectValue placeholder="Sort by" />
          </SelectTrigger>
          <SelectContent>
            <SelectGroup>
              <SelectLabel></SelectLabel>
              <SelectItem value="latest"> Latest </SelectItem>
              <SelectItem value="most-likes"> Most Likes </SelectItem>
              <SelectItem value="oldest"> Oldest </SelectItem>
            </SelectGroup>
          </SelectContent>
        </Select>

        <Separator class="my-4" />

        <Card class="border-none">
          <CardContent class="px-0 space-y-6">
            <template v-for="comment in comments" :key="commnent">
              <div class="flex gap-2">
                <Avatar>
                  <AvatarImage :src="comment.iamge_url" alt="@radix-vue" />
                  <AvatarFallback class="flex items-center">
                    <Icon name="mdi:anonymous" class="text-2xl text-muted-foreground" v-if="!comment.name" />
                    {{ comment.name?.slice(0, 2).toLocaleUpperCase() }}
                  </AvatarFallback>
                </Avatar>
                <div class="grid gap-2">
                  <div class="flex gap-3 items-center">
                    <h5 class="font-medium">{{ comment.name ?? "Anonymous" }}</h5>
                    <div class="flex items-center justify-center" v-if="!!comment.rating">
                      <template v-for="i in 5" :key="i">
                        <svg
                          class="w-3 h-3 me-1"
                          :class="i <= comment.rating ? 'text-[#FFA200] fill-current' : 'fill-neutral-300'"
                          aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 22 20"
                        >
                          <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"
                          />
                        </svg>
                      </template>
                    </div>
                    <h5 class="text-muted-foreground">{{ comment.created_at }}</h5>
                  </div>

                  <h5 class="font-light">
                    {{ comment.comment }}
                  </h5>

                  <div class="flex gap-4">
                    <Button size="sm" variant="link" class="text-muted-foreground hover:no-underline px-0">
                      <Icon name="lucide:thumbs-up" size="16" />
                      <h5 class="font-normal">{{ comment.likes >= 1000 ? (comment.likes / 1000).toFixed(1) + "K" : comment.likes }}</h5>
                    </Button>
                    <Button size="sm" variant="link" class="text-muted-foreground hover:no-underline px-0">
                      <Icon name="lucide:thumbs-down" size="16" />
                      <h5 class="font-normal">
                        {{ comment.dislikes >= 1000 ? (comment.dislikes / 1000).toFixed(1) + "K" : comment.dislikes }}
                      </h5>
                    </Button>
                  </div>
                </div>
              </div>
            </template>
          </CardContent>
        </Card>
      </CardContent>
    </Card>

    <section id="" class="">
      <div class="flex items-center gap-2 pb-8">
        <p class="text-xl font-bold">Other Events</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid grid-cols-4 mt-2 gap-4">
        <template v-for="i in 4" :key="i">
          <NuxtLink to="/events/slug">
            <EventCard past-events />
          </NuxtLink>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
