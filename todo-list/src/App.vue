<script>
import axios from 'axios';

const API_URL = "http://localhost/";

export default {
  name: "App",
  data() {
    return {
      newElem: "",

      todoList: [],
    };
  },

  methods: {
    // metodo per richiamare il server in cui sono conservati tutti i dati per stamparli in pagina
    getAllData() {
      axios.get(API_URL + "api.php")
        .then(res => {
          const data = res.data;
          this.todoList = data;
        });
    },

    // metodo per creare e inserire un nuovo elemento nella todoList
    createElem(e) {
      e.preventDefault();

      const newParams = {
        params: {
          'newElem': this.newElem
        }
      };

      axios.get(API_URL + 'create-todo.php', newParams)
        .then(() => {
          this.getAllData();
        });
    }
  },
  mounted() {

    this.getAllData();
  }
}
</script>

<template>
  <div class="container">
    <h1>Todo List</h1>

    <div class="ctn_list">
      <!-- form per inserire un nuovo elemento -->
      <form @submit="createElem">
        <label for="newElem">Inserisci un nuovo elemento: </label>
        <input type="text" name="newElem" v-model="newElem">
        <input type="submit" value="Crea">
      </form>
      <!-- lista in cui stampo i dati contenuti nel server -->
      <ul>
        <li v-for="(elem, ind) in todoList" :key="ind">
          {{ elem.text }}
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.container {
  background-color: blue;
  width: 900px;
  height: fit-content;
  margin: 100px auto;
  text-align: center;

  h1 {
    color: #ffffff;
  }

  .ctn_list {
    color: #ffffff;
    width: 80%;
    margin: 0 auto;
    padding: 10px;
    text-align: start;

    ul {
      padding: 0;
      list-style: none;

      li {
        font-size: 20px;
        border-bottom: solid 1px #ffffff;
        padding-bottom: 10px;
        margin-bottom: 20px;
      }
    }
  }
}
</style>
