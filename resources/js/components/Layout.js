import React, { useEffect } from "react";
import { Link as RouterLink } from "react-router-dom";
import { Container, Typography, Box } from "@material-ui/core";

function Layout(props) {
    useEffect(() => {
        document.title = props.title;
    }, [props.title]);

    return (
        <Container maxWidth="md">
            <Box pb={4}>
                <header>
                    <Typography component="h1" variant="h3">
                        <RouterLink to="/" style={{ textDecoration: "none" }}>
                            <Box py={2} textAlign="center" color="text.primary">
                                VH Challenge - Q&amp;A
                            </Box>
                        </RouterLink>
                    </Typography>
                </header>
                <main>{props.children}</main>
            </Box>
        </Container>
    );
}

export function withLayout(Component) {
    return props => (
        <Layout title={props.title}>
            <Component {...props} />
        </Layout>
    );
}
