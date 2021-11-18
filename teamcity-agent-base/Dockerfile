FROM jetbrains/teamcity-minimal-agent:2021.2

ENV USER buildagent
ENV HOME /home/$USER

USER root

RUN apt-get update && apt-get install --no-install-recommends -y git git-crypt gosu make \
 && rm -rf /var/lib/apt/lists/*
