FROM jetbrains/teamcity-minimal-agent:2019.1.1
MAINTAINER Pavel Sviderski <ps@stepik.org>

ENV USER buildagent
ENV HOME /home/$USER

RUN apt-get update && apt-get install --no-install-recommends -y git git-crypt make \
 && rm -rf /var/lib/apt/lists/* \
 # Prepare the build agent to start as the buildagent user
 && curl -o /usr/local/bin/gosu -SL "https://github.com/tianon/gosu/releases/download/1.10/gosu-amd64" \
 && chmod +x /usr/local/bin/gosu \
 && chown -R $USER:$USER /opt/buildagent \
 && sed -i 's/${AGENT_DIST}\/bin\/agent.sh start/gosu buildagent ${AGENT_DIST}\/bin\/agent.sh start/' \
    /run-agent.sh
