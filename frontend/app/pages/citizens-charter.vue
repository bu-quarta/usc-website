<script setup lang="ts">
  const citizensCharters: CitizensCharter[] = [
    {
      title: "Student Regent Commissioners",
      missions: [
        "The Student Regent Commissioners shall deliver quality service to the student body by overseeing all council initiatives and addressing student concerns. We shall be a vital link between students and administrators, advocating for students' issues and championing inclusive, collaborative, and transformative service.",
        "Our focus is on enhancing student welfare, ensuring effective institutional oversight, and launching programs that support the growth and development of the Bueños.",
      ],
      officers: [
        {
          name: "Stacy Daniel V. Alamares",
          fb_link: "",
          position: "Chairperson and Student Regent, BU-USC",
          college: "College of Arts and Letters",
          course: "AB English Language 4",
          bu_email: "stacydanielvibar.alamares@bicol-u.edu.ph",
        },
      ],
    },
    {
      title: "Internal Affairs Committee",
      missions: [
        "The Internal Affairs Committees' mission is to empower and inspire the student body through amplified channels of communication which fosters a culture of collaboration and drives meaningful change.",
        "Its goal is to implement impactful initiatives that improve student welfare, cater to community needs, and make a mark through service and action.",
      ],
      officers: [
        {
          name: "Jamille R. Buiza",
          fb_link: "",
          position: "Internal Vice Chairperson, BU-USC",
          college: "Jesse M. Robredo Institute of Governance and Development",
          course: "B Public Administration 4",
          bu_email: "jamillerodis.buiza@bicol-u.edu.ph",
        },
      ],
    },
    {
      title: "External Affairs Committee",
      missions: [
        "The External Affairs Committee is committed to fostering strategic partnerships and maintaining positive relationships with external stakeholders, including community leaders and partner organizations. We plan and implement initiatives to enhance the organization's visibility and standing.",
        "Our responsibilities include managing events, representing the council at external engagements, and pursuing sponsorships and partnerships to secure resources for organizational growth. By ensuring transparent communication and long-term collaboration, we contribute to the organization's objectives while promoting mutual benefits with our partners.",
      ],
      officers: [
        {
          name: "KC Maxinne Mendones",
          fb_link: "",
          position: "External Vice Chairperson, BU-USC",
          college: "College of Science",
          course: "BS Biology 3",
          bu_email: "kmam2022-3284-64835@bicoI-u.edu.ph",
        },
      ],
    },
    {
      title: "Secretariat Committee",
      missions: [
        "The Secretariat Committee is responsible for managing, organizing, archiving, producing, and reproducing council documents, such communication letters, notices, minutes of meetings, narrative reports, etc.",
        "Together with a council that advocates for accountable leadership, the committee continues to uphold discipline by maintaining an organized record system, promoting transparency through constant communication, and, above all, providing administrative support to their fellow officers.",
      ],
      officers: [
        {
          name: "Rancia Lei Bulawan",
          fb_link: "",
          position: "Secretary-General, BU-USC",
          college: "College of Business, Economics, and Management",
          course: "BSBA Management 4",
          bu_email: "rancialeibarcelona.bulawan@bicol-u.edu.ph",
        },
        {
          name: "Bea Lyzzah Madronio",
          fb_link: "",
          position: "Deputy Secretary-General, BU-USC",
          college: "College of Business, Economics, and Management",
          course: "BSBA Operations Management 3",
          bu_email: "bibm2022-9271-60342@bicoI-u.edu.ph",
        },
      ],
    },
    {
      title: "Finance Committee",
      missions: [
        "The Finance Committee is the committee responsible for disbursement, management, handling, and tracking of all finance-related entities in the council. They are the advocates of financial transparency and accountability, ensuring that every peso is being properly utilized.",
        "The goal of this committee is to disburse all funds in an effective and organized manner, where each cent will be for the service and well-being of the students. It is also their responsibility to provide timely and accurate reports to the body, and publish such endeavors for public scrutiny.",
      ],
      officers: [
        {
          name: "Yancy Bermas",
          fb_link: "",
          position: "Finance Officer, BU-USC",
          college: "College of Engineering",
          course: "BS Civil Engineering 4",
          bu_email: "yancysalinas.bermas@bicol-u.edu.ph",
        },
        {
          name: "Zharisse De Los Santos",
          fb_link: "",
          position: "Deputy Finance Officer, BU-USC",
          college: "College of Engineering",
          course: "BS Geodetic Engineering 4",
          bu_email: "zharissesantos.delossantos@bicol-u.edu.ph",
        },
      ],
    },
    {
      title: "Audit Committee",
      missions: [
        "The Audit Committee of the Council shall be responsible for upholding accountability and integrity within the Council by performing thorough and periodic audits and evaluations.",
        "Our goal is to provide the student body with the assurance that the University Student Council is operating effectively and productively while utilizing its resources for student benefit.",
      ],
      officers: [
        {
          name: "Arianna Kesi Digo",
          fb_link: "",
          position: "Auditor, BU-USC",
          college: "College of Business, Economics, and Management",
          course: "BS Accountancy 4",
          bu_email: "ariannakesiarmero.digo@bicol-u.edu.ph",
        },
      ],
    },
    {
      title: "Ways and Means Committee",
      missions: [
        "The Ways and Means Committee promotes responsible resource management and ensures that the council has a sustainable income source.",
        "Through effective revenue-generating strategies, the committee contributes significantly to ensuring that the council has enough funding to support projects, programs, and initiatives that will result in accessible genuine student-centric services for the students and the entire Bicol University community.",
      ],
      officers: [
        {
          name: "Izel Manata",
          fb_link: "",
          position: "Business Manager, BU-USC",
          college: "College of Arts and Letters",
          course: "AB Journalism 3",
          bu_email: "ibm2022-7479-16079@bicoI-u.edu.ph",
        },
      ],
    },
    {
      title: "Public Relations Committee",
      missions: [
        "The Public Relations Committee aims to be a defender of truth, a source of unbiased information, and a stronghold of transparency, accountability, integrity, and, most importantly, responsible communication.",
        "Given that misinformation and disinformation often outpace facts and where falsehoods can easily masquerade as truth, our goal is to foster a well-informed student community guided by accurate, reliable information.",
      ],
      officers: [
        {
          name: "Kyle Reuben Bron",
          fb_link: "",
          position: "Public Information Officer, BU-USC",
          college: "College of Social Sciences and Philosophy",
          course: "AB Political Science 3",
          bu_email: " krob2022-8625-72115@bicol-u.edu.ph",
        },
      ],
    },
  ]
</script>

<template>
  <div class="font-light container px-16">
    <section id="intro" class="pb-8 space-y-2">
      <p class="font-bold text-xl">Citizen’s Charter</p>
      <p class="grid grid-cols-2">
        BUeños, meet the ten passionate University Student Council (USC) officers and the committees they will lead this academic year. Each
        officer, alongside their respective committee, is driven by a clear mission and goals to serve and empower the student body.
      </p>
    </section>

    <section id="Preamble" class="py-8">
      <div class="text-center">
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2 pb-8">
          <Separator />
          <p class="text-lg font-semibold">Preamble</p>
          <Separator />
        </div>
        <p class="px-40">
          We, the students of Bicol University, expressing our faith in the divine providence in order to train ourselves in
          self-government; in order to promote high standards of character, scholarship, leadership and service; to foster a good
          relationship and understanding with the Bicol University Administration and the community; to maintain the effective cooperation
          and camaraderie among ourselves; and to contribute to the University goal of excellence in higher education in the region; do
          hereby promulgate and adopt this constitution.
        </p>
      </div>
    </section>

    <section id="content py-8 ">
      <div class="grid grid-cols-2 gap-4">
        <template v-for="citizensCharter in citizensCharters" :key="citizensCharter">
          <Card class="border-none">
            <CardHeader>
              <CardTitle class="text-xl">{{ citizensCharter.title }}</CardTitle>
              <Separator class="my-4" />
              <CardDescription class="text-foreground space-y-2">
                <template v-for="mission in citizensCharter.missions" :key="mission">
                  <p>{{ mission }}</p>
                </template>
              </CardDescription>
            </CardHeader>

            <CardContent class="space-y-4">
              <template v-for="officer in citizensCharter.officers" :key="officer">
                <Card class="pt-5">
                  <CardContent class="space-y-2">
                    <div>
                      <div class="flex justify-between items-center">
                        <p class="text-lg font-semibold">{{ officer.name }}</p>
                        <NuxtLink to="">
                          <Icon name="mingcute:facebook-fill" size="20" />
                        </NuxtLink>
                      </div>
                      <p class="text-foreground">{{ officer.position }}</p>
                    </div>
                    <p class="font-medium">{{ officer.college }}</p>
                    <p>{{ officer.course }}</p>
                    <p class="flex items-center gap-1 font-light">
                      <Icon name="ic:baseline-email" /> <span>{{ officer.bu_email }}</span>
                    </p>
                  </CardContent>
                </Card>
              </template>
            </CardContent>
          </Card>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
