<template>
  <div class="mainPage">
    <hr />
    <b-row no-gutters>
      <h1 class="mx-auto">Popular Past Projects</h1>
    </b-row>
    <hr />

    <b-row no-gutters>
      <b-col md="3"></b-col>
      <b-col md="6">
        <a class="mx-auto" :href="captions[slide].link">
          {{ captions[slide].title }}
        </a>
      </b-col>
      <b-col md="3"></b-col>
    </b-row>

    <b-row>
      <b-col md="3"></b-col>
      <b-col md="6">
        <b-carousel
          id="carousel"
          v-model="slide"
          class="mt-2 mx-auto"
          controls
          indicators
          fade
          @sliding-start="onSlideStart"
          @sliding-end="onSlideEnd"
        >
          <b-carousel-slide
            img-src="http://localhost/files/2018-ball-state-competition.jpg"
          ></b-carousel-slide>

          <b-carousel-slide
            img-src="http://localhost/files/2016-it-competition.jpg"
          ></b-carousel-slide>

          <b-carousel-slide
            img-src="http://localhost/files/2019-fall-senior-project-presentations.jpg"
          ></b-carousel-slide>

          <b-carousel-slide
            img-src="http://localhost/files/2016-spring-mobile-app.jpg"
          ></b-carousel-slide>
        </b-carousel>
      </b-col>
      <b-col md="3"></b-col>
    </b-row>
    
    <b-row no-gutters>
      <b-col md="3"></b-col>
      <b-col md="6">
        <a class="mt-2 mx-auto">
          {{ captions[slide].subtext }}
        </a>
      </b-col>
      <b-col md="3"></b-col>
    </b-row>
  </div>
</template>

<script>
/*import { Vue } from "vue-property-decorator";*/

export default /*class mainPage extends Vue*/ {
  name: "mainPage",
  data() {
    return {
      slide: 0,
      sliding: null,
      captions: [
        {
          title: "USI Students Take Second Place at Ball State Informations Systems Competition",
          link: "https://www.usi.edu/business/romain-college-of-business-news-archive/2018-news/usi-students-take-second-place-at-ball-state-informations-systems-competition/",
          subtext: ""
        },
        {
          title: "Students Represent USI at IT Competition, Receive Two Awards for Real-World Project",
          link: "https://www.usi.edu/business/romain-college-of-business-news-archive/2016-news/students-represent-usi-at-it-competition-receive-two-awards-for-real-world-project",
          subtext: ""
        },
        {
          title: "Computer Science Senior Project Presentations",
          link: "https://www.usi.edu/business/romain-college-of-business-news-archive/2019-news/computer-science-senior-project-presentations/",
          subtext: ""
        },
        {
          title: "USI Students Create Custom Mobile App for Local Business",
          link: "https://www.usi.edu/news/releases/2017/04/usi-students-create-custom-mobile-app-for-local-business/",
          subtext: ""
        }
        ,
        {
          title: "",
          link: "",
          subtext: ""
        }
      ]
    }
  },
  methods: {
    onSlideStart() {
      this.sliding = true
    },
    onSlideEnd() {
      this.sliding = false
    }
  }
};

</script>

<style scoped>
.border {
  border: 5;
}
hr {
  width: 90%;
}
</style>