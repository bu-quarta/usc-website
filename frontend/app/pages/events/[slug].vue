<script setup lang="ts">
  import { CalendarOff } from "lucide-vue-next"

  const slug = useRoute().params.slug
  const { data, refresh } = await useAsyncData<EventPostDetail>("event-post", () => useSanctumFetch(`/api/event-posts/${slug}`))

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${data?.value?.event_post.image_url}`)

  const sortComment = ref()
  const currentRating = ref(0)
  const commentRating = ref(4)

  const setRating = (rating: number): void => {
    currentRating.value = rating
  }

  const comments = computed(() => {
    if (!data?.value) return []

    if (sortComment.value === "latest") {
      return [...data.value.comments].sort((a, b) => new Date(b.created_at_iso).getTime() - new Date(a.created_at_iso).getTime())
    }

    if (sortComment.value === "most-liked") {
      return [...data.value.comments].sort((a, b) => b.likes - a.likes)
    }

    if (sortComment.value === "oldest") {
      return [...data.value.comments].sort((a, b) => new Date(a.created_at_iso).getTime() - new Date(b.created_at_iso).getTime())
    }

    return data.value.comments
  }) as Ref<Comment[]>

  const _comment = ref("")
  const isAnonymously = ref(false)

  const submit = async () => {
    if (!_comment.value) return

    const commentData = {
      content: _comment.value,
      comment_type: "event_post",
      comment_type_id: data?.value?.event_post.id,
      is_anonymous: isAnonymously.value,
    }

    try {
      await useSanctumFetch(`/api/comments`, {
        method: "POST",
        body: JSON.stringify(commentData),
      })

      _comment.value = ""
      await refresh()
      sortComment.value = "latest"
    } catch (error) {
      console.error(error)
    }
  }
</script>

<template>
  <div v-if="!!data" class="container px-32">
    <Card class="py-8 border-none">
      <CardContent>
        <AspectRatio v-if="image_url" :ratio="2">
          <NuxtImg :src="image_url" alt="event" class="rounded-md object-cover w-full h-full" />
        </AspectRatio>
        <Skeleton v-else class="h-96 w-full" />
        <div class="flex justify-between items-center p-4">
          <CardHeader class="p-0">
            <CardTitle>{{ data?.event_post.title }}</CardTitle>
            <div>
              <div class="flex gap-8">
                <p class="text-foreground">{{ data?.event_post.date_time }}</p>
                <p class="flex items-center gap-1">
                  <Icon name="mdi:location" />
                  <span>{{ data?.event_post.location }}</span>
                </p>
              </div>
            </div>
          </CardHeader>
          <Button size="sm">
            <p>Evaluate</p>
            <Icon name="lucide:pencil" />
          </Button>
        </div>

        <p class="whitespace-pre-wrap p-4">{{ data?.event_post.description }}</p>

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
          <div>
            <NuxtLink v-if="!!data.previous_event.slug" :to="`/events/${data?.previous_event.slug}`">
              <Card class="border-[#0099CB]">
                <CardContent class="py-2 flex justify-between items-center w-44 gap-2">
                  <div>
                    <Icon name="mingcute:arrow-left-line" />
                  </div>
                  <div class="font-semibold text-right">
                    <p class="text-gray-500">Previous</p>
                    <p class="text-[#0099CB] line-clamp-1">{{ data.previous_event.title }}</p>
                  </div>
                </CardContent>
              </Card>
            </NuxtLink>
          </div>

          <NuxtLink v-if="!!data.next_event.slug" :to="`/events/${data?.next_event.slug}`">
            <Card class="bg-[#0099CB] border-[#0099CB]">
              <CardContent class="py-2 flex justify-between items-center w-44">
                <div class="font-semibold">
                  <p class="text-[#FFFFFFBF]">Next</p>
                  <p class="text-secondary">{{ data.next_event.title }}</p>
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
            class="w-10 h-10 me-1 cursor-pointer"
            :class="i <= currentRating ? 'text-[#FFA200] fill-current' : 'fill-neutral-400'"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 22 20"
            @click="setRating(i)"
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
          <Textarea id="message" v-model="_comment" placeholder="Write a comment" />
        </div>
        <div class="flex gap-2 justify-end">
          <div class="flex items-center space-x-2">
            <Label for="comment-anonymously">Comment Anonymously</Label>
            <Switch id="comment-anonymously" v-model:checked="isAnonymously" />
          </div>
          <Button size="sm" class="bg-[#0099CB] hover:bg-[#008ebe] uppercase" @click="submit">
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
              <SelectItem value="most-liked"> Most Likes </SelectItem>
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
                  <AvatarImage :src="comment.user?.avatar as string" alt="@radix-vue" />
                  <AvatarFallback class="flex items-center">
                    <Icon v-if="!comment.user?.name" name="mdi:anonymous" class="text-2xl text-muted-foreground" />
                    {{ comment.user?.name.slice(0, 2).toLocaleUpperCase() }}
                  </AvatarFallback>
                </Avatar>
                <div class="grid gap-2">
                  <div class="flex gap-3 items-center">
                    <h5 class="font-medium">{{ comment.user?.name ?? "Anonymous" }}</h5>
                    <div v-if="!!comment.rating" class="flex items-center justify-center">
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
                    {{ comment.content }}
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

    <section v-if="!!data.other_events.length" id="other-events">
      <div class="flex items-center gap-2 pb-8">
        <p class="text-xl font-bold">Other Events</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid grid-cols-4 mt-2 gap-4">
        <template v-for="other_event in data.other_events" :key="other_event">
          <NuxtLink :to="`/events/${other_event.slug}`">
            <EventCard :event-post="other_event as EventPost" past-events />
          </NuxtLink>
        </template>
      </div>
    </section>
  </div>

  <div v-else class="container px-32 h-[50vh] flex flex-col justify-center items-center gap-2 select-none text-muted-foreground">
    <CalendarOff :size="32" />
    <h4 class="font-semibold">Event not found.</h4>
  </div>
</template>

<style scoped></style>
