FROM stepik/teamcity-agent-base:2019.1.1
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV DOCKER_VERSION 18.06.1
ENV DOCKER_GROUP_ID 233

# Install docker binary (/var/run/docker.sock is mounted from the host)
RUN curl -o /tmp/docker.tgz https://download.docker.com/linux/static/stable/x86_64/docker-${DOCKER_VERSION}-ce.tgz \
 && tar xzf /tmp/docker.tgz -C /tmp/ docker/docker \
 && mv /tmp/docker/docker /usr/local/bin/ \
 && rm -rf /tmp/*

# Create docker group and add build agent user to it to grant access to docker unix socket
RUN groupadd -g $DOCKER_GROUP_ID docker && gpasswd -a $USER docker

# TODO: python3.4 (edy), python3.6 (plugins)
