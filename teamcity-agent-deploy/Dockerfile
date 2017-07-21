FROM stepik/teamcity-agent-base:2017.1.2
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV ANSIBLE_VERSION 2.3.1.0

RUN apt-get update && apt-get install --no-install-recommends -y \
    python2.7 python2.7-dev python-setuptools python-pip gcc openssh-client \
 && rm -rf /var/lib/apt/lists/*

RUN pip install --no-cache-dir -U pip \
 && pip install --no-cache-dir ansible==$ANSIBLE_VERSION

COPY ansible.cfg $HOME/.ansible.cfg
