import Axios from "axios";

async function fetchQuestions() {
    const res = await Axios.get("/api/questions");
    const questions = res.data;

    return questions;
}

async function createQuestion(body) {
    const res = await Axios.post(`/api/questions`, { body });
    const questionId = res.data;

    return questionId;
}

async function createAnswer(id, body) {
    const res = await Axios.post(`/api/questions/${id}/answers`, { body });
    const answerId = res.data;

    return answerId;
}

export default { fetchQuestions, createQuestion, createAnswer };
