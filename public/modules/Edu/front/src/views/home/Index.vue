<template>
  <div>
    <headers/>
    <knowledge/>
    <school/>
    <student/>
    <question/>
    <tutorial/>
    <Appraise/>
    <contact/>
  </div>
</template>

<script>
  import "@/assets/theme/css/theme.css"
  import Headers from "./components/Header";
  import Knowledge from "./components/Knowledge";
  import Student from "./components/Student";
  import School from "./components/School";
  import Tutorial from "./components/Tutorial";
  import Contact from "./components/Contact";
  import Question from "./components/Question";
  import Appraise from "./components/Appraise";

  export default {
    components: {
      Headers, Knowledge, Student, School, Tutorial, Contact, Question, Appraise
    }
  }
</script>

<style scoped>
  body {
    background: #fff;
  }
</style>
