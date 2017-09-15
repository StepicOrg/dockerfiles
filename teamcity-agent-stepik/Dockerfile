FROM stepik/teamcity-agent-base:2017.1.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV DOCKER_VERSION 17.06.2

# Install docker binary (/var/run/docker.sock is mounted from the host)
RUN curl -o /tmp/docker.tgz https://download.docker.com/linux/static/stable/x86_64/docker-${DOCKER_VERSION}-ce.tgz \
 && tar xzf /tmp/docker.tgz -C /tmp/ docker/docker \
 && mv /tmp/docker/docker /usr/local/bin/ \
 && rm -rf /tmp/*

# TODO: python3.4 (edy), python3.6 (plugins)
