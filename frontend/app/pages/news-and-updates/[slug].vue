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
        <CardHeader class="p-4">
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
      </CardContent>
    </Card>

    <Separator />

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
              <SelectLabel />
              <SelectItem value="latest"> Latest </SelectItem>
              <SelectItem value="most-likes"> Most Likes </SelectItem>
              <SelectItem value="oldest"> Oldest </SelectItem>
            </SelectGroup>
          </SelectContent>
        </Select>

        <Separator class="my-4" />

        <Card class="border-none">
          <CardContent class="px-0 space-y-6">
            <template v-for="comment in comments" :key="comment">
              <div class="flex gap-2">
                <Avatar>
                  <AvatarImage :src="comment.iamge_url" alt="@radix-vue" />
                  <AvatarFallback class="flex items-center">
                    <Icon v-if="!comment.name" name="mdi:anonymous" class="text-2xl text-muted-foreground" />
                    {{ comment.name?.slice(0, 2).toLocaleUpperCase() }}
                  </AvatarFallback>
                </Avatar>
                <div class="grid gap-2">
                  <div class="flex gap-3 items-center">
                    <h5 class="font-medium">{{ comment.name ?? "Anonymous" }}</h5>
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
        <p class="text-xl font-bold">Read More</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid grid-cols-4 mt-2 gap-4">
        <template v-for="i in 7" :key="i">
          <NuxtLink to="/news-and-updates/slug">
            <NewsAndUpdateCard />
          </NuxtLink>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
