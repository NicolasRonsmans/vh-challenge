import React, { useEffect } from "react";
import { BrowserRouter, Switch, Route, Redirect } from "react-router-dom";
import { get, isNumber } from "lodash";
import { useStore } from "../store";
import Questions from "./Questions";
import Question from "./Question";
import API from "../api";

function generateTitle(body = null) {
    let title = "VH Challenge";

    return `${title} | ${body !== null ? body : "Home"}`;
}

function getQuestion(match, store, dispatch) {
    let id = get(match, "params.id", null);

    if (id === null) {
        return null;
    }

    id = Number.parseInt(id);

    const questions = store.filter(q => q.id === id);

    if (questions.length !== 1) {
        return null;
    }

    const question = questions[0];

    return (
        <Question
            title={generateTitle(question.body)}
            dispatch={dispatch}
            {...question}
        />
    );
}

function Router() {
    const [store, dispatch] = useStore();

    useEffect(() => {
        API.fetchQuestions().then(questions =>
            dispatch({
                type: "FETCH_QUESTIONS",
                questions
            })
        );
    }, []);

    return (
        <BrowserRouter basename="/spa">
            <Switch>
                <Route path="/" exact>
                    <Questions
                        title={generateTitle()}
                        store={store}
                        dispatch={dispatch}
                    />
                </Route>
                <Route path="/questions/:id">
                    {({ match }) => getQuestion(match, store, dispatch)}
                </Route>
                <Redirect to="/" />
            </Switch>
        </BrowserRouter>
    );
}

export default Router;
