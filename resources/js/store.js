import { useReducer } from "react";

function reducer(state, action) {
    switch (action.type) {
        case "FETCH_QUESTIONS":
            return [...action.questions];
        case "ADD_QUESTION":
            return [...state, action.question];
        case "ADD_ANSWER":
            return state.map(question => {
                if (question.id !== action.questionId) {
                    return question;
                }

                return {
                    ...question,
                    answers: [...question.answers, action.answer]
                };
            });
        default:
            return state;
    }
}

export function useStore() {
    const [state, action] = useReducer(reducer, []);

    return [state, action];
}
